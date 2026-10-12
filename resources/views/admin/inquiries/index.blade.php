@extends('layouts.admin')

@section('title', 'Customer Inquiries & Quotes')
@section('page_title', 'Customer Inquiries')

@section('content')
    <div class="card border-0 rounded-4 shadow-sm mb-4">
        <div class="card-body p-3 p-md-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
                <div class="d-flex align-items-center gap-2">
                    <h5 class="fw-bold text-dark mb-0">Inquiries Inbox</h5>
                    @if ($unreadCount > 0)
                        <span class="badge bg-danger rounded-pill">{{ $unreadCount }} Unread</span>
                    @endif
                </div>

                <!-- Filters -->
                <form action="{{ route('admin.inquiries.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search sender, email, query..." value="{{ request('search') }}">
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Unread Only</option>
                        <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read Only</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                    @if (request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-danger">Clear</a>
                    @endif
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Sender</th>
                            <th>Contact</th>
                            <th>Subject / Product</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inquiries as $inq)
                            <tr class="{{ !$inq->is_read ? 'table-primary bg-opacity-10 fw-semibold' : '' }}">
                                <td class="ps-4">
                                    <div class="text-dark">{{ $inq->name }}</div>
                                    <small class="text-muted">{{ $inq->email }}</small>
                                </td>
                                <td>
                                    @if ($inq->phone)
                                        <a href="tel:{{ $inq->phone }}" class="text-dark text-decoration-none small">
                                            <i class="fa fa-phone me-1 text-primary"></i> {{ $inq->phone }}
                                        </a>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="text-dark">{{ Str::limit($inq->subject ?? 'General Inquiry', 45) }}</div>
                                    @if ($inq->service_needed)
                                        <span class="badge bg-light text-secondary border small">{{ $inq->service_needed }}</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">{{ $inq->created_at->format('M d, Y h:i A') }}</small>
                                </td>
                                <td>
                                    @if (!$inq->is_read)
                                        <span class="badge bg-danger rounded-pill">Unread</span>
                                    @else
                                        <span class="badge bg-light text-muted border rounded-pill">Read</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-outline-primary" title="Read Message">
                                            <i class="fa fa-envelope-open"></i> View
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" onclick="confirmDeletion('delInqForm{{ $inq->id }}', 'Delete inquiry from {{ addslashes($inq->name) }}?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="delInqForm{{ $inq->id }}" action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No customer inquiries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($inquiries->hasPages())
                <div class="p-3 border-top d-flex justify-content-center">
                    {{ $inquiries->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection
