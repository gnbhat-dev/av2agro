@extends('admin.layout')

@section('admin-content')

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0">Testimonials</h4>
  <a href="{{ route('admin.testimonials.create') }}" class="btn btn-sm" style="background:#6a3013;color:#fff">
    + Add Testimonial
  </a>
</div>

<div class="bg-white rounded shadow-sm">
  <table class="table table-hover mb-0">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Location</th>
        <th>Status</th>
        <th>Order</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($testimonials as $t)
        <tr>
          <td>{{ $t->id }}</td>
          <td>
            <img src="{{ $t->photo_url }}" width="50" height="50" alt="" style="object-fit:cover;border-radius:6px">
          </td>
          <td>
            <strong>{{ $t->name }}</strong>
            <div class="text-muted small text-truncate" style="max-width:240px">{{ \Illuminate\Support\Str::limit($t->message, 80) }}</div>
          </td>
          <td>{{ $t->location ?: '—' }}</td>
          <td>
            @if ($t->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td>{{ $t->sort_order }}</td>
          <td>
            <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Delete this testimonial?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center text-muted py-4">No testimonials yet.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-3">{{ $testimonials->links() }}</div>

@endsection
