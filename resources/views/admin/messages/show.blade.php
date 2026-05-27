@extends('admin.layout')

@section('admin-content')

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0">Message from {{ $message->name }}</h4>
  <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">Back to list</a>
</div>

<div class="bg-white rounded shadow-sm p-4">
  <dl class="row mb-0">
    <dt class="col-sm-2">Email</dt>
    <dd class="col-sm-10"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>

    <dt class="col-sm-2">Mobile</dt>
    <dd class="col-sm-10">{{ $message->mobile ?: '—' }}</dd>

    <dt class="col-sm-2">Received</dt>
    <dd class="col-sm-10">{{ $message->created_at->format('d M Y, H:i') }}</dd>

    <dt class="col-sm-2">Status</dt>
    <dd class="col-sm-10">
      @if ($message->is_read)
        <span class="badge bg-secondary">Read</span>
      @else
        <span class="badge badge-unread">New</span>
      @endif
    </dd>

    <dt class="col-sm-2 mt-3">Message</dt>
    <dd class="col-sm-10 mt-3">
      <div class="border rounded p-3 bg-light" style="white-space:pre-wrap">{{ $message->message }}</div>
    </dd>
  </dl>

  <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="mt-4"
        onsubmit="return confirm('Delete this message?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger">Delete message</button>
  </form>
</div>

@endsection
