{{-- ============================================================ --}}
{{-- resources/views/layouts/app.blade.php — Main shared layout --}}
{{-- ============================================================ --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Av2 Agro | Pure Sugar & Premium Rice')</title>
  <link rel="icon" type="image/png" href="{{ asset('images/fav.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  @stack('styles')
</head>
<body>

  @include('partials.header')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="{{ asset('js/script.js') }}"></script>

  @stack('scripts')
</body>
</html>
