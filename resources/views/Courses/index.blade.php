@extends('layouts.app')

@section('title', 'TechConnect - Explore Programming Courses')

@section('content')
<div class="container my-5">
    <!-- Featured Course Banner -->
    <div class="card shadow-sm mb-5 rounded overflow-hidden">
        <div class="row g-0">
            <div class="col-md-6 bg-primary text-white p-5 d-flex flex-column justify-content-center">
                <h1 class="fw-bold">TechConnect: Learn to Code, Build the Future</h1>
                <p class="lead">A hands-on coding platform that empowers you to master Python, data science, and real-world tech skills—all in one place.</p>
                <div class="mt-4">
                    <a href="#" class="btn btn-light btn-lg">Start Course</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="images/ilustration.jpg" class="img-fluid h-100 w-100 object-fit-cover">
            </div>
        </div>
    </div>

    <!-- Popular Courses -->
    <h2 class="mb-4">Popular This Week</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
        @foreach($popularCourses as $course)
        <div class="col">
            <div class="card h-100 course-card shadow-sm">
                <img src="{{ $course->thumbnail ?? getCourseImage($course) }}" class="card-img-top" alt="{{ $course->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="mb-1 text-muted">TechConect Team</p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-book-open me-1"></i> {{ $course->lessons_count }} Lessons</span>
                        <span><i class="fas fa-laptop-code me-1"></i> {{ $course->challenges_count }} Challenges</span>
                    </div>
                </div>
                <a href="{{ route('courses.show', $course->id) }}" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Introduction Courses -->
    <h2 class="mb-4">Introduction Courses</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        @foreach($introductionCourses as $course)
        <div class="col">
            <div class="card h-100 course-card shadow-sm">
                <img src="{{ $course->thumbnail ?? getCourseImage($course) }}" class="card-img-top" alt="{{ $course->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="mb-1 text-muted">TechConnect Team</p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-book-open me-1"></i> {{ $course->lessons_count }} Lessons</span>
                        <span><i class="fas fa-laptop-code me-1"></i> {{ $course->challenges_count }} Challenges</span>
                    </div>
                </div>
                <a href="{{ route('courses.show', $course->id) }}" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@php
    function getCourseImage($course) {
        // Hanya gunakan ID-based approach
        if ($course->id == 1) {
            return 'images/courses/python.png';
        } elseif ($course->id == 2) {
            return 'images/courses/javascript.png';
        } elseif ($course->id == 3) {
            return 'images/courses/c.png';
        } elseif ($course->id == 4) {
            return 'images/courses/html.png';
        } else {
            // Default placeholder jika diperlukan
            return 'images/default-course.png';
        }
    }
@endphp
