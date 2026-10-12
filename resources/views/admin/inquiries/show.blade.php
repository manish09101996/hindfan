@extends('layouts.admin')

@section('title', 'View Inquiry: ' . $inquiry->name)
@section('page_title', 'Inquiry Details')

@section('content')
    <div class="row">
        <div class="col-lg-9 col-xl-8 mx-auto">
            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <h5 class="fw-bold text-dark mb-0">Message from {{ $inquiry->name }}</h5>
                        <span class="badge bg-success-subtle text-success rounded-pill">Read</span>
                    </div>
                    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                        <i class="fa fa-arrow-left me-1"></i> Back to Inquiries
                    </a>
                </div>

                <div class="card-body p-4 p-md-5">
                    <div class="row g-4 mb-4 pb-4 border-bottom">
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Sender Name</small>
                            <h5 class="fw-bold text-dark mb-0">{{ $inquiry->name }}</h5>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Email Address</small>
                            <a href="mailto:{{ $inquiry->email }}" class="fs-6 fw-semibold text-primary">
                                {{ $inquiry->email }} <i class="fa fa-envelope small"></i>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Phone Number</small>
                            @if ($inquiry->phone)
                                <a href="tel:{{ $inquiry->phone }}" class="fs-6 fw-semibold text-dark">
                                    {{ $inquiry->phone }} <i class="fa fa-phone small text-success"></i>
                                </a>
                            @else
                                <span class="text-muted">Not provided</span>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Product Line of Interest</small>
                            <span class="badge bg-primary px-3 py-2">{{ $inquiry->service_needed ?? 'General Inquiry' }}</span>
                        </div>
                        <div class="col-12">
                            <small class="text-muted d-block">Subject</small>
                            <div class="fw-bold text-dark fs-6">{{ $inquiry->subject ?? 'No Subject Specified' }}</div>
                        </div>
                    </div>

                    <!-- Message Body -->
                    <div class="mb-5">
                        <h6 class="fw-bold text-secondary text-uppercase small mb-3">Customer Message Content:</h6>
                        <div class="p-4 bg-light rounded-3 border fs-6 lh-lg text-secondary" style="white-space: pre-wrap;">
{{ $inquiry->message }}
                        </div>
                        <div class="d-flex justify-content-between text-muted small mt-2">
                            <span>Received: {{ $inquiry->created_at->format('l, F j, Y \a\t g:i A') }}</span>
                            @if ($inquiry->ip_address)
                                <span>Sender IP: {{ $inquiry->ip_address }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <button type="button" class="btn btn-outline-danger" onclick="confirmDeletion('delInqForm', 'Permanently delete this message?')">
                            <i class="fa fa-trash me-1"></i> Delete Message
                        </button>

                        <div class="d-flex gap-2">
                            @if ($inquiry->phone)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}?text={{ urlencode('Hello ' . $inquiry->name . ', thank you for contacting Hindson Industries.') }}" target="_blank" class="btn btn-success">
                                    <i class="fab fa-whatsapp me-1"></i> WhatsApp Reply
                                </a>
                            @endif
                            <a href="mailto:{{ $inquiry->email }}?subject={{ urlencode('Re: ' . ($inquiry->subject ?? 'Your Hindfan Inquiry')) }}" class="btn btn-primary">
                                <i class="fa fa-reply me-1"></i> Email Reply
                            </a>
                        </div>
                    </div>

                    <form id="delInqForm" action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
