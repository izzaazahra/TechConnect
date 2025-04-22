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

        .register-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(25, 85, 214, 0.1);
            overflow: hidden;
            position: relative;
        }

        .register-container::before {
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

        .register-title {
            color: var(--primary-blue);
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .register-subtitle {
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

        .login-link {
            color: var(--primary-blue);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link:hover {
            color: var(--primary-yellow);
        }

        .register-illustration {
            background-color: var(--light-blue);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .register-badge {
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

        .requirements-list {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }

        .requirements-list i {
            font-size: 0.75rem;
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .register-container {
                margin: 15px;
            }
        }

        .password-strength {
            height: 5px;
            margin-top: 8px;
            border-radius: 5px;
            background: #e9ecef;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s ease;
            background: linear-gradient(to right, #ff4757, #F59E0B, #28a745);
        }
    </style>
</head>

<body>
    <section class="p-3 p-md-4 p-xl-5 w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card register-container border-0">
                        <span class="register-badge">TechConnect</span>
                        <div class="row g-0">
                            <div class="col-12 col-md-5 d-none d-md-block">
                                <div class="register-illustration">
                                    {{-- <img src="/api/placeholder/400/320" alt="Register illustration" class="img-fluid mb-4" /> --}}
                                    <h4 class="text-center mb-3" style="color: var(--primary-blue)">Join Our Community</h4>
                                    <p class="text-center text-muted">Create an account and start your tech journey today</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="card-body p-3 p-md-5">
                                    <div class="text-center d-block d-md-none mb-4">
                                        {{-- <img src="/api/placeholder/150/50" alt="TechConnect Logo" class="brand-logo" /> --}}
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <h2 class="register-title">Create Account</h2>
                                                <p class="register-subtitle">Please fill in your details to get started</p>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('account.processRegister') }}" method="post">
                                        @csrf
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <label for="name" class="form-label fw-bold mb-2">Full Name</label>
                                                <div class="input-group input-with-icon mb-2">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                    <input type="text" value="{{ old('name') }}"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" id="name" placeholder="Enter your full name">
                                                </div>
                                                @error('name')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="email" class="form-label fw-bold mb-2">Email Address</label>
                                                <div class="input-group input-with-icon mb-2">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                    <input type="email" value="{{ old('email') }}"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" id="email" placeholder="name@example.com">
                                                </div>
                                                @error('email')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="password" class="form-label fw-bold mb-2">Password</label>
                                                <div class="input-group input-with-icon mb-2">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                    </span>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" id="password" placeholder="Create a strong password">
                                                </div>
                                                <div class="password-strength">
                                                    <div class="password-strength-bar" id="password-strength-bar"></div>
                                                </div>
                                                <ul class="requirements-list list-unstyled mt-2">
                                                    <li><i class="fas fa-check-circle"></i> Minimum 8 characters</li>
                                                    <li><i class="fas fa-check-circle"></i> Include numbers and symbols</li>
                                                    <li><i class="fas fa-check-circle"></i> Mix uppercase and lowercase letters</li>
                                                </ul>
                                                @error('password')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label for="password_confirmation" class="form-label fw-bold mb-2">Confirm Password</label>
                                                <div class="input-group input-with-icon mb-2">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-shield-alt"></i>
                                                    </span>
                                                    <input type="password" class="form-control"
                                                        name="password_confirmation"
                                                        id="password_confirmation"
                                                        placeholder="Confirm your password">
                                                </div>
                                            </div>

                                            <div class="col-12 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                                    <label class="form-check-label" for="terms">
                                                        I agree to the <a href="#" class="login-link">Terms of Service</a> and <a href="#" class="login-link">Privacy Policy</a>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-4">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary-custom" type="submit">
                                                        <i class="fas fa-user-plus me-2"></i>Create Account
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
                                                    or sign up with
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
                                                <span class="text-muted">Already have an account?</span>
                                                <a href="{{ route('account.login') }}" class="login-link ms-1">
                                                    Sign in instead
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
    <script>
        // Simple password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            let strength = 0;
            const password = this.value;
            const strengthBar = document.getElementById('password-strength-bar');

            if (password.length > 0) {
                // Length check
                if (password.length >= 8) {
                    strength += 25;
                }

                // Uppercase letter check
                if (password.match(/[A-Z]/)) {
                    strength += 25;
                }

                // Number check
                if (password.match(/[0-9]/)) {
                    strength += 25;
                }

                // Special character check
                if (password.match(/[^A-Za-z0-9]/)) {
                    strength += 25;
                }
            }

            strengthBar.style.width = strength + '%';
        });
    </script>
</body>

</html>
