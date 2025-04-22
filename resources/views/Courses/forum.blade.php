@extends('layouts.app')

@section('title', $course->title . ' - Discussion Forum')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2 class="mb-4">Discussion Forum: {{ $course->title }}</h2>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Start a Discussion</h5>
                    <form>
                        <div class="mb-3">
                            <label for="discussionTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="discussionTitle" placeholder="Enter a title for your discussion">
                        </div>
                        <div class="mb-3">
                            <label for="discussionContent" class="form-label">Question or Comment</label>
                            <textarea class="form-control" id="discussionContent" rows="3" placeholder="What would you like to discuss?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Discussion</button>
                    </form>
                </div>
            </div>

            <!-- Sample Discussion Topics -->
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">How to implement array slicing in Python?</h5>
                            <p class="text-muted mb-1">Posted by <span class="fw-semibold">John Doe</span> - 2 days ago</p>
                        </div>
                        <span class="badge bg-primary rounded-pill">5 replies</span>
                    </div>
                    <p class="mb-0 mt-2">I'm having trouble understanding how to properly slice arrays in Python. Can someone explain the syntax?</p>
                    <div class="mt-3">
                        <a href="#" class="btn btn-sm btn-outline-primary">View Discussion</a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Getting error with NumPy reshape function</h5>
                            <p class="text-muted mb-1">Posted by <span class="fw-semibold">Jane Smith</span> - 3 days ago</p>
                        </div>
                        <span class="badge bg-primary rounded-pill">12 replies</span>
                    </div>
                    <p class="mb-0 mt-2">I'm trying to reshape an array but getting a value error. Here's my code snippet...</p>
                    <div class="mt-3">
                        <a href="#" class="btn btn-sm btn-outline-primary">View Discussion</a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Best practices for handling missing data?</h5>
                            <p class="text-muted mb-1">Posted by <span class="fw-semibold">Michael Johnson</span> - 1 week ago</p>
                        </div>
                        <span class="badge bg-primary rounded-pill">8 replies</span>
                    </div>
                    <p class="mb-0 mt-2">I'm working with a dataset that has a lot of missing values. What's the best approach to handle this?</p>
                    <div class="mt-3">
                        <a href="#" class="btn btn-sm btn-outline-primary">View Discussion</a>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

            <div class="text-center mt-4">
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Course
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
