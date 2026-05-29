@extends('admin.layout')

@section('admin-content')

<div class="container py-4">

    {{-- PAGE HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">
                Homepage Banners
            </h3>

            <p class="text-muted mb-0">
                Manage homepage slider banners
            </p>

        </div>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    {{-- ADD BANNER FORM --}}
    <div class="card shadow-sm mb-4">

        <div class="card-header fw-bold">
            Add New Banner
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.banners.store') }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- TITLE --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Banner Title
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control"
                               required>

                    </div>

                    {{-- BUTTON TEXT --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Button Text
                        </label>

                        <input type="text"
                               name="button_text"
                               class="form-control">

                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"></textarea>

                    </div>

                    {{-- BUTTON LINK --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Button Link
                        </label>

                        <input type="text"
                               name="button_link"
                               class="form-control"
                               placeholder="/products">

                    </div>

                    {{-- IMAGE --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Banner Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*"
                               required>
                    </div>

                </div>

                <button class="btn btn-primary">

                    Upload Banner

                </button>

            </form>

        </div>

    </div>

    {{-- EXISTING BANNERS --}}
    <div class="card shadow-sm">

        <div class="card-header fw-bold">
            Existing Banners
        </div>

        <div class="card-body">

            @if($banners->count() == 0)

                <p class="text-muted mb-0">
                    No banners added yet.
                </p>

            @endif

            <div class="row">

                @foreach($banners as $banner)

                    <div class="col-md-6 mb-4">

                        <div class="border rounded p-3">

                            {{-- IMAGE --}}
                            <img src="{{ asset('storage/' . $banner->image) }}"
                                 class="img-fluid rounded mb-3"
                                 style="height:220px;
                                        width:100%;
                                        object-fit:cover;">

                            {{-- TITLE --}}
                            <h5>
                                {{ $banner->title }}
                            </h5>

                            {{-- DESCRIPTION --}}
                            <p class="text-muted">
                                {{ $banner->description }}
                            </p>

                            {{-- BUTTON --}}
                            @if($banner->button_text)

                                <span class="badge bg-primary">

                                    {{ $banner->button_text }}

                                </span>

                            @endif

                            <hr>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.banners.destroy', $banner->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this banner?')">

                                    Delete

                                </button>

                                <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection