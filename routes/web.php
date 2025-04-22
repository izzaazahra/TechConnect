<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;

// Temporary storage for demonstration
$userProfile = [
    'foto' => 'default.jpg',
    'nama' => 'John Doe',
    'email' => 'john.doe@example.com'
];

Route::get('/', function () {
    return view('welcome');
})->name('landingpage');

//halaman awal
Route::prefix('account')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'index'])->name('account.login');
    Route::post('/login', [AuthController::class, 'auth'])->name('account.auth');

    // Register
    Route::get('/register', [AuthController::class, 'register'])->name('account.register');
    Route::post('/register', [AuthController::class, 'processRegister'])->name('account.processRegister');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');
});

//halaman user sesudah login
    Route::get('/courses', [CourseController::class, 'dashboard'])->name('courses.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{id}/forum', [CourseController::class, 'forum'])->name('courses.forum');
    Route::get('/courses/{id}/quiz', [CourseController::class, 'quiz'])->name('courses.quiz');

// Admin routes
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
// User management routes
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    // Course management routes
    Route::get('/courses', [AdminController::class, 'courses'])->name('admin.courses');
    Route::get('/courses/create', [AdminController::class, 'createCourse'])->name('admin.courses.create');
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
    Route::get('/courses/{course}/edit', [AdminController::class, 'editCourse'])->name('admin.courses.edit');
    Route::put('/courses/{course}', [AdminController::class, 'updateCourse'])->name('admin.courses.update');
    Route::delete('/courses/{course}', [AdminController::class, 'deleteCourse'])->name('admin.courses.delete');


//profile
Route::get('/profile', function () use ($userProfile) {
    return view('profile', ['user' => (object)$userProfile]);
})->name('profile');

Route::get('/profile/edit', function () use ($userProfile) {
    return view('profile_edit', ['user' => (object)$userProfile]);
})->name('profile.edit');

Route::post('/profile/update', function (Request $request) use (&$userProfile) {
    // Validate the input
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255'
    ]);

    // Update the profile data
    $userProfile['nama'] = $request->input('nama');
    $userProfile['email'] = $request->input('email');

    return redirect()->route('profile')
        ->with('success', 'Profil berhasil diperbarui!');
})->name('profile.update');

//logout
Route::get('logout', [AuthController::class, 'logout'])->name('account.logout');
