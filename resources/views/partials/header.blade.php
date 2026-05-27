{{-- ============================================================ --}}
{{-- resources/views/partials/header.blade.php --}}
{{-- ============================================================ --}}

<!-- Top Info Bar -->
<div class="top-bar py-2">
  <div class="container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
      <p class="mb-1 mb-md-0 small text-white text-center text-md-start">
        Quality You Can Taste. Purity You Can Trust.
      </p>
      <div class="social-icons mt-1 mt-md-0">
        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-nav">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">
      <img src="{{ asset('images/logo.png') }}" height="40" alt="Av2 Agro">
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="mainNav">
      <ul class="navbar-nav gap-3">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('products*') ? 'active' : '' }}" href="{{ route('products') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}#quality">Quality</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
