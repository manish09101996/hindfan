<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Hindfan Portfolio Management</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6.5.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Modern Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=2.1">
</head>
<body class="bg-light">

    <!-- Admin Sidebar Navigation -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="admin-sidebar-brand justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Hindfan Logo" style="height: 38px; filter: brightness(1.2);">
                <div>
                    <div class="fw-bold text-white lh-1">HINDFAN ADMIN</div>
                    <small class="text-danger fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">PORTFOLIO BACKEND</small>
                </div>
            </div>
            <button class="btn btn-sm btn-outline-secondary text-white d-lg-none p-1 border-0" type="button" onclick="document.getElementById('adminSidebar').classList.remove('show'); document.getElementById('adminBackdrop').classList.remove('show');">
                <i class="fa fa-times fs-5"></i>
            </button>
        </div>

        <div class="py-3">
            <div class="px-3 mb-2 text-uppercase" style="font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; color: #94A3B8;">
                Navigation
            </div>
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa fa-chart-line w-5"></i> Dashboard
            </a>

            <div class="px-3 mt-3 mb-2 text-uppercase" style="font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; color: #94A3B8;">
                Portfolio System
            </div>
            <a href="{{ route('admin.portfolio.index') }}" class="admin-nav-item {{ request()->routeIs('admin.portfolio.index') ? 'active' : '' }}">
                <i class="fa fa-layer-group w-5"></i> All Projects
            </a>
            <a href="{{ route('admin.portfolio.create') }}" class="admin-nav-item {{ request()->routeIs('admin.portfolio.create') ? 'active' : '' }}">
                <i class="fa fa-plus-circle w-5"></i> Add New Project
            </a>
            <a href="{{ route('admin.categories.index') }}" class="admin-nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fa fa-tags w-5"></i> Categories
            </a>

            <div class="px-3 mt-3 mb-2 text-uppercase" style="font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; color: #94A3B8;">
                Communications
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="admin-nav-item {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                <i class="fa fa-envelope w-5"></i> Customer Inquiries
                @php
                    $unreadCount = \App\Models\Inquiry::where('is_read', false)->count();
                @endphp
                @if($unreadCount > 0)
                    <span class="badge bg-danger rounded-pill ms-auto">{{ $unreadCount }}</span>
                @endif
            </a>

            <div class="px-3 mt-3 mb-2 text-uppercase" style="font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; color: #94A3B8;">
                Configuration
            </div>
            <a href="{{ route('admin.settings.index') }}" class="admin-nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa fa-sliders w-5"></i> Contact &amp; Social
            </a>

            <div class="px-3 mt-3 mb-2 text-uppercase" style="font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; color: #94A3B8;">
                Website
            </div>
            <a href="{{ route('home') }}" target="_blank" class="admin-nav-item">
                <i class="fa fa-arrow-up-right-from-square w-5"></i> Live Website
            </a>
        </div>

        <div class="mt-auto p-3 border-top" style="border-color: rgba(255, 255, 255, 0.08) !important;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="small fw-bold text-white">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <small style="font-size: 0.75rem; color: #94A3B8;">admin@hindfan.com</small>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger p-1 px-2" title="Log Out">
                        <i class="fa fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>
    <div class="admin-backdrop" id="adminBackdrop" onclick="document.getElementById('adminSidebar').classList.remove('show'); this.classList.remove('show');"></div>

    <!-- Main Content Wrapper -->
    <div class="admin-main-content">
        <!-- Top Navigation Header -->
        <header class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none border" type="button" onclick="document.getElementById('adminSidebar').classList.toggle('show'); document.getElementById('adminBackdrop').classList.toggle('show');">
                    <i class="fa fa-bars"></i>
                </button>
                <h4 class="mb-0 fw-bold text-dark">@yield('page_title', 'Portfolio Dashboard')</h4>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill">
                    <i class="fa fa-globe me-1"></i> View Website
                </a>
                <div class="dropdown">
                    <button class="btn btn-sm btn-light border rounded-pill d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                        <i class="fa fa-user-circle text-primary fs-5"></i>
                        <span class="d-none d-sm-inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa fa-sign-out-alt me-2"></i> Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Flash Alert Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-2" role="alert">
                <i class="fa fa-circle-check fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-2" role="alert">
                <i class="fa fa-circle-exclamation fs-5"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <div class="fw-bold mb-1"><i class="fa fa-triangle-exclamation me-1"></i> Form Submission Errors:</div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Slot Content -->
        @yield('content')
    </div>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
