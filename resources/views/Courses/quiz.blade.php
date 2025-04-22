@extends('layouts.app')

@section('title', $course->title . ' - Quiz')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2 class="mb-4">Quiz: {{ $course->title }}</h2>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Module 1 Quiz</h5>
                        <span class="badge bg-primary">10 Questions</span>
                    </div>

                    <form id="quizForm">
                        <!-- Question 1 -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between">
                                    <strong>Question 1</strong>
                                    <span>1 of 10</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">What is NumPy primarily used for in Python?</h5>

                                <div class="mt-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question1" id="q1a" value="a">
                                        <label class="form-check-label" for="q1a">Web development</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question1" id="q1b" value="b">
                                        <label class="form-check-label" for="q1b">Numerical computing and array operations</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question1" id="q1c" value="c">
                                        <label class="form-check-label" for="q1c">Building graphical user interfaces</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question1" id="q1d" value="d">
                                        <label class="form-check-label" for="q1d">Database management</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <div class="d-flex justify-content-between">
                                    <strong>Question 2</strong>
                                    <span>2 of 10</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Which of the following creates a NumPy array from a Python list?</h5>

                                <div class="mt-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question2" id="q2a" value="a">
                                        <label class="form-check-label" for="q2a">np.array([1, 2, 3])</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question2" id="q2b" value="b">
                                        <label class="form-check-label" for="q2b">np.list([1, 2, 3])</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question2" id="q2c" value="c">
                                        <label class="form-check-label" for="q2c">np.convert([1, 2, 3])</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="question2" id="q2d" value="d">
                                        <label class="form-check-label" for="q2d">np.create_array([1, 2, 3])</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- More questions would go here -->

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Quiz</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Course
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('quizForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Quiz submitted! This is a placeholder for the actual quiz submission logic.');
        // Here you would typically make an AJAX request to submit the quiz answers
    });
</script>
@endsection
