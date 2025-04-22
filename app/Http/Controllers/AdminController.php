<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $courseCount = Course::count();

        return view('admin.dashboard', [
            'userCount' => $userCount,
            'courseCount' => $courseCount,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landingpage');
    }

    public function users(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin\user', compact('users', 'search'));
    }

    public function editUser(User $user)
    {
        return view('admin\edituser', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|in:student,admin',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'bio' => $request->bio,
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    // course

    public function courses(Request $request)
    {
        $search = $request->input('search');

        $courses = Course::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', "%$search%")
                        ->orWhere('category', 'like', "%$search%");
        })
        ->withCount('modules')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin/course', compact('courses', 'search'));
    }

    public function createCourse()
    {
        $categories = ['python', 'c', 'php', 'javascript', 'html', 'css'];
        $levels = ['beginner', 'intermediate', 'advanced'];

        return view('admin/create', compact('categories', 'levels'));
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'level' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $courseData = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $courseData['thumbnail'] = $path;
        }

        Course::create($courseData);

        return redirect()->route('admin.courses')->with('success', 'Course created successfully');
    }

    public function editCourse(Course $course)
    {
        $categories = ['python', 'c', 'php', 'javascript', 'html', 'css'];
        $levels = ['beginner', 'intermediate', 'advanced'];

        return view('admin/editcourse', compact('course', 'categories', 'levels'));
    }

    public function updateCourse(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'level' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_popular' => 'boolean',
        ]);

        $courseData = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($course->thumbnail) {
                Storage::disk('public')->delete($course->thumbnail);
            }

            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $courseData['thumbnail'] = $path;
        }

        $course->update($courseData);

        return redirect()->route('admin.courses')->with('success', 'Course updated successfully');
    }

    public function deleteCourse(Course $course)
    {
        // Delete thumbnail if exists
        if ($course->thumbnail) {
            Storage::disk('public')->delete($course->thumbnail);
        }

        $course->delete();
        return redirect()->route('admin.courses')->with('success', 'Course deleted successfully');
    }
}


