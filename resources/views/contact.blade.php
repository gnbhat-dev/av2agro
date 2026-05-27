{{-- resources/views/contact.blade.php --}}

@extends('layout.app')

@section('title', 'Contact Us | Av2 Agro')

@section('content')

<section class="about-section">
  <img src="{{ asset('images/cnt.png') }}" class="d-block w-100" alt="">
  <div class="inner_bnr_caption">
    <h1>Contact Us</h1>
  </div>
</section>

<section class="contact-page">
  <div class="container">

    <div class="contact-header">
      <h4>Contact Us</h4>
      <p class="small">Have a question, idea, or project in mind? We'd love to hear from you.</p>
    </div>

    {{-- Success Flash Message --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="contact-wrapper">

      <!-- Contact Info -->
      <div class="contact-info">
        <h3>Get in Touch</h3>

        <p><strong>Phone:</strong><br>+91 25855 43210</p>
        <p><strong>Email:</strong><br>info@example.com</p>
        <p>
          <strong>Address:</strong><br>
          Av2 agro,<br>Abc Street, Ernakulam, Kerala
        </p>

        <div class="map-wrap">
          <iframe
            src="https://maps.google.com/maps?q=kochi&t=&z=13&ie=UTF8&iwloc=&output=embed"
            loading="lazy">
          </iframe>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="contact-form">
        <form action="{{ route('contact.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" required>
            @error('name')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input
              type="tel"
              id="mobile"
              name="mobile"
              value="{{ old('mobile') }}"
              class="{{ $errors->has('mobile') ? 'is-invalid' : '' }}"
            >
            @error('mobile')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input
              type="email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
              required
            >
            @error('email')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea
              id="message"
              name="message"
              rows="5"
              class="{{ $errors->has('message') ? 'is-invalid' : '' }}"
              required
            >{{ old('message') }}</textarea>
            @error('message')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit">Send Message</button>

        </form>
      </div>

    </div>
  </div>
</section>

@endsection
