@extends('admin.layout')

@section('admin-content')

<h4 class="mb-4">Add Testimonial</h4>

<div class="bg-white rounded shadow-sm p-4" style="max-width:680px">
  <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label class="form-label fw-500">Name *</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required maxlength="100">
      @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label fw-500">Location</label>
      <input type="text" name="location" class="form-control" value="{{ old('location') }}" maxlength="100">
    </div>

    <div class="mb-3">
      <label class="form-label fw-500">Message *</label>
      <textarea name="message" class="form-control" rows="4" required maxlength="1000">{{ old('message') }}</textarea>
      @error('message')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label fw-500">Photo</label>
      <input type="file" name="photo" class="form-control" accept="image/jpeg,image/png,image/jpg">
      @error('photo')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label class="form-label fw-500">Sort order</label>
          <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <label class="form-label fw-500">Status</label>
          <select name="is_active" class="form-select">
            <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('is_active', '1') == '0' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>
      </div>
    </div>

    <button type="submit" class="btn" style="background:#6a3013;color:#fff">Save</button>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>

@endsection
