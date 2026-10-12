@extends('layouts.app')

@section('content')
    <section class="py-5 bg-light my-5 text-center">
        <div class="container py-5">
            <div class="display-1 fw-bold text-primary mb-3">404</div>
            <h2 class="fw-bold text-dark mb-3">Project or Page Not Found</h2>
            <p class="text-muted fs-5 mb-4 max-w-lg mx-auto">
                The portfolio project or page you are looking for may have been moved, unpublished, or the link may be outdated.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('home') }}" class="btn-modern btn-primary-modern">
                    <i class="fa fa-home"></i> Back to Homepage
                </a>
                <a href="{{ route('portfolio') }}" class="btn-modern btn-outline-modern">
                    <i class="fa fa-grid-2"></i> Browse Portfolio
                </a>
                <a href="{{ route('contact') }}" class="btn-modern btn-outline-modern">
                    <i class="fa fa-envelope"></i> Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection
