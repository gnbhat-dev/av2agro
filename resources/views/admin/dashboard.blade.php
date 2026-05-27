@extends('admin.layout')

@section('admin-content')

<h4 class="mb-4">Dashboard</h4>

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="stat-card brown">
            <div class="fs-2 fw-bold">{{ $stats['products'] }}</div>
            <div>Products</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card gold">
            <div class="fs-2 fw-bold">{{ $stats['testimonials'] }}</div>
            <div>Testimonials</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card dark">
            <div class="fs-2 fw-bold">{{ $stats['messages'] }}</div>
            <div>Total Messages</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card" style="background:#b03a00;">
            <div class="fs-2 fw-bold">{{ $stats['unread'] }}</div>
            <div>Unread Messages</div>
        </div>
    </div>

</div>

<h5 class="mb-3">Recent Messages</h5>

<table class="table table-bordered bg-white">

    <thead class="table-light">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

        @forelse($recentMessages as $msg)

        <tr>
            <td>{{ $msg->name }}</td>
            <td>{{ $msg->email }}</td>
            <td>{{ $msg->created_at->format('d M Y') }}</td>

            <td>
                @if(!$msg->is_read)
                    <span class="badge badge-unread">New</span>
                @else
                    <span class="badge bg-secondary">Read</span>
                @endif
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="4" class="text-center">
                No messages found.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection