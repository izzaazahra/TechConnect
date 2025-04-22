<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechConnect</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1955d6;
            --primary-yellow: #F59E0B;
            --light-blue: #e6ecfe;
            --dark-blue: #154bb9;
        }

        body {
            background: linear-gradient(135deg, var(--light-blue) 0%, #ffffff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(25, 85, 214, 0.1);
            overflow: hidden;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, var(--primary-blue), var(--primary-yellow));
        }

        .btn-primary-custom {
            background: linear-gradient(to right, var(--primary-blue), var(--dark-blue));
            border: none;
            color: white;
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 12px;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 85, 214, 0.3);
        }

        .form-control {
            border: 2px solid #e9ecef;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(25, 85, 214, 0.25);
        }

        .login-title {
            color: var(--primary-blue);
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .login-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
        }

        .input-group-text {
            background-color: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            color: var(--primary-blue);
        }

        .input-with-icon .form-control {
            border-left: none;
        }

        .input-with-icon .input-group-text {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .input-with-icon .form-control {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .create-account-link {
            color: var(--primary-blue);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .create-account-link:hover {
            color: var(--primary-yellow);
        }

        .login-illustration {
            background-color: var(--light-blue);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .login-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: var(--primary-yellow);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }

        .brand-logo {
            height: 50px;
            margin-bottom: 20px;
        }

        .btn-back {
            color: var(--primary-blue);
            background-color: transparent;
            border: 2px solid var(--primary-blue);
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 15px;
            }
        }
    </style>
</head>

<body>
    <section class="p-3 p-md-4 p-xl-5 w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card login-container border-0">
                            <a href="{{ route('landingpage')}}" class="btn btn-back">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        <span class="login-badge">TechConnect</span>
                        <div class="row g-0">
                            <div class="col-12 col-md-5 d-none d-md-block">
                                <div class="login-illustration">
                                    {{-- <img src="images/welcome.jpg" alt="Login illustration" class="img-fluid mb-4" /> --}}
                                    <h4 class="text-center mb-3" style="color: var(--primary-blue)">Welcome Back!</h4>
                                    <p class="text-center text-muted">Access your account and continue your tech journey</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="card-body p-3 p-md-5">
                                    <div class="text-center d-block d-md-none mb-4">
                                        <img src="/api/placeholder/150/50" alt="TechConnect Logo" class="brand-logo" />
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            @if (Session::has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <i class="fas fa-check-circle me-2"></i>
                                                    {{ Session::get('success') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            @if (Session::has('error'))
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <i class="fas fa-exclamation-circle me-2"></i>
                                                    {{ Session::get('error') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <div class="mb-4">
                                                <h2 class="login-title">Sign In</h2>
                                                <p class="login-subtitle">Please enter your credentials to continue</p>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('account.auth') }}" method="POST">
                                        @csrf
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <label for="email" class="form-label fw-bold mb-2">Email Address</label>
                                                <div class="input-group input-with-icon mb-2">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" id="email" placeholder="name@example.com">
                                                </div>
                                                @error('email')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <label for="password" class="form-label fw-bold mb-0">Password</label>
                                                    <a href="#" class="small create-account-link">Forgot password?</a>
                                                </div>
                                                <div class="input-group input-with-icon mb-2">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                    </span>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" id="password" placeholder="Enter your password">
                                                </div>
                                                @error('password')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="remember-me">
                                                    <label class="form-check-label" for="remember-me">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary-custom" type="submit">
                                                        <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="position-relative text-center">
                                                <hr class="my-4">
                                                <span class="position-absolute top-50 start-50 translate-middle px-3 bg-white text-muted">
                                                    or continue with
                                                </span>
                                            </div>

                                            <div class="d-flex gap-2 justify-content-center my-3">
                                                <button class="btn btn-outline-secondary px-4">
                                                    <i class="fab fa-google"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary px-4">
                                                    <i class="fab fa-facebook"></i>
                                                </button>
                                                <button class="btn btn-outline-secondary px-4">
                                                    <i class="fab fa-apple"></i>
                                                </button>
                                            </div>

                                            <div class="text-center mt-4">
                                                <span class="text-muted">Don't have an account?</span>
                                                <a href="{{ route('account.register') }}" class="create-account-link ms-1">
                                                    Create an account
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
