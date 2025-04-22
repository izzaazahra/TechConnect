<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TechConnect - Learn Programming Online')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #1955d6;
            --secondary-color: #6c757d;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 60px;
        }

        .navbar-brand img {
            height: 40px;
        }

        .course-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--primary-color);
        }

        .course-header {
            background-size: cover;
            background-position: center;
            padding: 80px 0;
            color: white;
            position: relative;
        }

        .course-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
            z-index: 0;
        }

        .course-header-content {
            position: relative;
            z-index: 1;
        }

        .video-container {
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .module-content {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .progress-container {
            margin: 30px 0;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('courses.index') }}">
                <div class="me-2" style="width: 40px; height: 40px; background-color: #0d6efd; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-code text-white"></i>
                </div>
                <span>TechConnect</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Forum</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="input-group me-2">
                        <input type="text" class="form-control" placeholder="Search courses...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <a href="{{ route('profile') }}" class="btn btn-primary me-2">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <a href="{{ route('account.logout') }}" class="btn btn-outline-danger">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>TechConnect</h5>
                    <p>Learn coding the fun way</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-decoration-none">Courses</a></li>
                        <li><a href="#" class="text-decoration-none">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Connect With Us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-decoration-none"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-decoration-none"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-decoration-none"><i class="fab fa-github fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; {{ date('Y') }} TechConnect. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('scripts')
</body>
</html>
