<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Hindfan Portfolio System</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6.5.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-dark d-flex align-items-center min-vh-100 position-relative">
    <div class="hero-pattern"></div>
    <div class="hero-glow hero-glow-1"></div>

    <div class="container position-relative py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="card-body p-4 p-sm-5 bg-white">
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Hindfan Logo" class="mx-auto mb-3" style="height: 52px;">
                            <h3 class="fw-bold text-dark mb-1">Hindfan Management</h3>
                            <p class="text-muted small">Sign in to manage portfolio projects and customer inquiries</p>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger py-2 px-3 small border-0 mb-4">
                                <i class="fa fa-circle-exclamation me-1"></i> {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger py-2 px-3 small border-0 mb-4">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('admin.login.submit') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold small text-secondary">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fa fa-envelope text-muted"></i></span>
                                    <input type="email" class="form-control border-start-0" id="email" name="email" required autofocus value="{{ old('email', 'admin@hindfan.com') }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold small text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fa fa-lock text-muted"></i></span>
                                    <input type="password" class="form-control border-start-0" id="password" name="password" required value="password">
                                </div>
                                <div class="small text-muted mt-1">Default credentials: <code>admin@hindfan.com</code> / <code>password</code></div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label small text-muted" for="remember">Keep me signed in</label>
                            </div>

                            <button type="submit" class="btn-modern btn-primary-modern w-100 py-2">
                                <i class="fa fa-sign-in-alt"></i> Sign In to Admin Panel
                            </button>
                        </form>

                        <div class="text-center mt-4 pt-3 border-top">
                            <a href="{{ route('home') }}" class="text-muted small text-decoration-none">
                                <i class="fa fa-arrow-left me-1"></i> Back to Public Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
