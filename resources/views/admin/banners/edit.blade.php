@extends('admin.layout')

@section('admin-content')

<div class="container py-4">

    <h3>Edit Banner</h3>

    <form method="POST"
          action="{{ route('admin.banners.update', $banner->id) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <input type="text"
               name="title"
               value="{{ $banner->title }}"
               class="form-control mb-2">

        <textarea name="description"
                  class="form-control mb-2">{{ $banner->description }}</textarea>

        <input type="text"
               name="button_text"
               value="{{ $banner->button_text }}"
               class="form-control mb-2">

        <input type="text"
               name="button_link"
               value="{{ $banner->button_link }}"
               class="form-control mb-2">

        <p>Current Image:</p>

        <img src="{{ asset('storage/'.$banner->image) }}"
             style="width:200px;"
             class="mb-2">

        <input type="file"
               name="image"
               class="form-control mb-2">

        <button class="btn btn-primary">
            Update
        </button>

    </form>

</div>

@endsection