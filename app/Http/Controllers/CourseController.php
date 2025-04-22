<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CourseController extends Controller
{
    public function dashboard()
    {
        $popularCourses = Course::where('is_popular', true)->take(4)->get();
        $introductionCourses = Course::where('category', 'like', 'introduction%')->take(4)->get();

        return view('courses.index', compact('popularCourses', 'introductionCourses'));
    }

    public function show($id)
    {
        $course = Course::with(['modules.videos'])->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function forum($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.forum', compact('course'));
    }

    public function quiz($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.quiz', compact('course'));
    }
}
