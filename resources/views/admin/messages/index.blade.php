@extends('admin.layout')

@section('admin-content')

<h4 class="mb-4">Contact messages</h4>

<div class="bg-white rounded shadow-sm">
  <table class="table table-hover mb-0">
    <thead class="table-light">
      <tr>
        <th>Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($messages as $message)
        <tr class="{{ ! $message->is_read ? 'table-warning' : '' }}">
          <td class="text-nowrap small">{{ $message->created_at->format('d M Y H:i') }}</td>
          <td>{{ $message->name }}</td>
          <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
          <td>{{ $message->mobile ?: '—' }}</td>
          <td>
            @if (! $message->is_read)
              <span class="badge badge-unread">New</span>
            @else
              <span class="badge bg-secondary">Read</span>
            @endif
          </td>
          <td class="text-end">
            <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary">Open</a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Delete this message?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center text-muted py-4">No messages yet.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-3">{{ $messages->links() }}</div>

@endsection
