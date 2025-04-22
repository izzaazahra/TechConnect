@extends('layouts.app')

@section('title', $course->title . ' - Coddy')

@section('styles')
<style>
    .progress-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: conic-gradient(var(--primary-color) 0%, var(--primary-color) calc(var(--progress) * 1%), #e9ecef calc(var(--progress) * 1%), #e9ecef 100%);
        position: relative;
    }

    .progress-circle::before {
        content: '';
        position: absolute;
        inset: 5px;
        border-radius: 50%;
        background: white;
    }

    .progress-circle .progress-text {
        position: relative;
        z-index: 1;
        font-weight: bold;
    }

    .module-header {
        background-color: #f8f9fa;
        border-left: 4px solid var(--primary-color);
        padding: 10px 15px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .video-title {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .course-nav {
        position: sticky;
        top: 70px;
        z-index: 100;
        background-color: white;
        padding: 10px 0;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    .content-wrapper {
        max-width: 900px;
        margin: 0 auto;
    }

    .accordion-button {
        padding: 1rem;
        font-weight: 500;
    }

    .accordion-body {
        padding: 1.5rem;
    }

    .module-description {
        color: #6c757d;
        margin-bottom: 20px;
    }

    .badge-module {
        background-color: rgba(13, 110, 253, 0.1);
        color: var(--primary-color);
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .video-container {
        border: 1px solid rgba(0,0,0,0.1);
    }
</style>
@endsection

@section('content')
<!-- Course Header -->
<div class="course-header mb-4" style="background-image: url('https://via.placeholder.com/1200x400/0d6efd/FFFFFF?text={{ urlencode($course->title) }}')">
    <div class="container course-header-content">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-4 fw-bold">{{ $course->title }}</h1>
                <p class="lead">{{ $course->description }}</p>
                <div class="d-flex align-items-center mt-3">
                    <span class="badge bg-light text-dark me-2">{{ ucfirst($course->level) }}</span>
                    <span class="badge bg-light text-dark me-2">{{ $course->lessons_count }} Lessons</span>
                    <span class="badge bg-light text-dark">{{ $course->challenges_count }} Challenges</span>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center justify-content-md-end mt-4 mt-md-0">
                <div class="bg-white p-3 rounded shadow-sm d-inline-flex align-items-center">
                    <img src="https://via.placeholder.com/50x50?text=CT" class="rounded-circle" alt="Coddy Team">
                    <div class="ms-3">
                        <p class="mb-0 fw-bold">Created by</p>
                        <p class="mb-0">Coddy Team</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Course Navigation -->
<div class="course-nav border-bottom mb-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#content">Course Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.forum', $course->id) }}">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Resources</a>
                </li>
            </ul>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="{{ route('courses.forum', $course->id) }}" class="btn btn-outline-primary">
                    <i class="fas fa-comments me-1"></i> Forum Diskusi
                </a>
                <a href="{{ route('courses.quiz', $course->id) }}" class="btn btn-outline-primary">
                    <i class="fas fa-question-circle me-1"></i> Mulai Quiz
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Course Content -->
<div class="container mb-5" id="content">
    <div class="content-wrapper">
        <!-- Progress Section -->
        <div class="progress-container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-1">Your Progress</h5>
                            <p class="text-muted mb-0">Keep going, you're doing great!</p>
                        </div>
                        <div style="--progress: 25" class="progress-circle">
                            <span class="progress-text">25%</span>
                        </div>
                    </div>
                    <div class="progress mt-3" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Module Video Section -->
        @if($course->modules->count() > 0 && $course->modules->first()->videos->count() > 0)
        <div class="mb-4">
            <h3 class="mb-3">Current Lesson</h3>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="video-title">{{ $course->modules->first()->videos->first()->title }}</h4>
                    <div class="ratio ratio-16x9 video-container">
                        <iframe
                            src="https://www.youtube.com/embed/{{ $course->modules->first()->videos->first()->youtube_id }}"
                            title="{{ $course->modules->first()->videos->first()->title }}"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Modules Accordion -->
        <h3 class="mb-3">Course Modules</h3>
        <div class="accordion shadow-sm" id="courseModules">
            @foreach($course->modules as $index => $module)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $module->id }}">
                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $module->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $module->id }}">
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span>{{ $module->title }}</span>
                            <span class="badge badge-module">
                                <i class="fas fa-play-circle me-1"></i> {{ $module->videos->count() }} Videos
                            </span>
                        </div>
                    </button>
                </h2>
                <div id="collapse{{ $module->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $module->id }}" data-bs-parent="#courseModules">
                    <div class="accordion-body">
                        <div class="module-content mb-4">
                            {!! $module->content !!}
                        </div>

                        <h5 class="mb-3">Video Tutorials</h5>
                        <div class="list-group">
                            @foreach($module->videos as $video)
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                               data-video-id="{{ $video->youtube_id }}"
                               data-video-title="{{ $video->title }}">
                                <div>
                                    <i class="fas fa-play-circle me-2 text-primary"></i>
                                    <span>{{ $video->title }}</span>
                                </div>
                                <span class="badge bg-primary rounded-pill">
                                    <i class="fas fa-clock me-1"></i> 10:15
                                </span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="my-5 text-center">
            <h3>Ready to test your knowledge?</h3>
            <p class="mb-4">Take a quiz to see how much you've learned from this course!</p>
            <a href="{{ route('courses.quiz', $course->id) }}" class="btn btn-primary btn-lg">
                <i class="fas fa-question-circle me-1"></i> Mulai Quiz
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Function to update the video player with a new video
    function loadVideo(videoId, videoTitle) {
        const videoContainer = document.querySelector('.video-container iframe');
        videoContainer.src = `https://www.youtube.com/embed/${videoId}`;
        document.querySelector('.video-title').textContent = videoTitle;

        // Scroll to the video section
        document.querySelector('.video-container').scrollIntoView({ behavior: 'smooth' });
    }

    // Add click handlers to all video links
    document.addEventListener('DOMContentLoaded', function() {
        const videoLinks = document.querySelectorAll('.list-group-item[data-video-id]');
        videoLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const videoId = this.getAttribute('data-video-id');
                const videoTitle = this.getAttribute('data-video-title');
                loadVideo(videoId, videoTitle);
            });
        });
    });
</script>
@endsection
