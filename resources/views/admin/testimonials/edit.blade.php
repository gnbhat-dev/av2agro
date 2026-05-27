@extends('admin.layout')

@section('admin-content')

<h4 class="mb-4">Edit Testimonial</h4>

<div class="bg-white rounded shadow-sm p-4" style="max-width:680px">
  <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label fw-500">Name *</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required maxlength="100">
      @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label fw-500">Location</label>
      <input type="text" name="location" class="form-control" value="{{ old('location', $testimonial->location) }}" maxlength="100">
    </div>

    <div class="mb-3">
      <label class="form-label fw-500">Message *</label>
      <textarea name="message" class="form-control" rows="4" required maxlength="1000">{{ old('message', $testimonial->message) }}</textarea>
      @error('message')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label fw-500">Photo</label>
      @if ($testimonial->photo)
        <div class="mb-2">
          <img src="{{ $testimonial->photo_url }}" width="100" style="border-radius:6px" alt="">
          <div class="text-muted small">Upload a new file to replace.</div>
        </div>
      @endif
      <input type="file" name="photo" class="form-control" accept="image/jpeg,image/png,image/jpg">
      @error('photo')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label class="form-label fw-500">Sort order</label>
          <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0">
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label class="form-label fw-500">Status</label>
          <select name="is_active" class="form-select">
            <option value="1" {{ old('is_active', $testimonial->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('is_active', $testimonial->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>
      </div>
    </div>

    <button type="submit" class="btn" style="background:#6a3013;color:#fff">Update</button>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>

@endsection
