{{-- resources/views/home.blade.php --}}

@extends('layout.app')

@section('title', 'Av2 Agro | Pure Sugar & Premium Rice')

@section('content')

<style>
  .hero-section .carousel-item img {
    height: 100vh;
    object-fit: cover;
  }

  .hero-section {
    position: relative;
  }

  .product-slider-section {
    position: relative;
    margin-top: 0;
    z-index: 5;
  }
</style>

<section class="hero-section">

  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">

      @foreach($banners as $key => $banner)

      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

        <img src="{{ asset('storage/' . $banner->image) }}"
          class="d-block w-100"
          alt="{{ $banner->title }}">

        <div class="carousel-caption text-start">

          <h1>{{ $banner->title }}</h1>

          <p>{{ $banner->description }}</p>

          @if($banner->button_text)

          <a href="{{ $banner->button_link }}"
            class="btn btn-primary banner_btn">

            {{ $banner->button_text }}

          </a>

          @endif

        </div>

      </div>

      @endforeach
    </div>

    {{-- PREVIOUS BUTTON --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">

      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

      <span class="visually-hidden">
        Previous
      </span>

    </button>


    {{-- NEXT BUTTON --}}
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">

      <span class="carousel-control-next-icon" aria-hidden="true"></span>

      <span class="visually-hidden">
        Next
      </span>

    </button>

  </div>

</section>

<section class="product-slider-section">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-lg-2 col-md-4 mb-3 mb-md-0">
        <h3 class="text-white">Our Products</h3>
        <p class="text-white small">Naturally grown. Carefully processed.</p>
      </div>
      <div class="col-lg-10 col-md-8">
        <div class="owl-carousel product-carousel">
          @forelse ($products as $product)
          <div class="product-card">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-card-img">
            <div class="pdt_cnt">
              <div class="pdt_cnt_img">
                <img src="{{ asset('images/fssi.png') }}" alt="fssai">
                <img src="{{ asset('images/qr.png') }}" alt="qr">
              </div>
              <h6>{{ $product->name }}</h6>
              <p>{{ $product->short_description }}</p>
            </div>
          </div>
          @empty
          @php
          $fallbackProducts = [
          ['img' => 'p1.png', 'name' => 'Rice', 'desc' => 'Premium quality grains'],
          ['img' => 'p2.png', 'name' => 'Heirloom Rices', 'desc' => 'Ancient & nutritious'],
          ['img' => 'p3.png', 'name' => 'Millets', 'desc' => 'Healthy everyday grains'],
          ['img' => 'p1.png', 'name' => 'Flours', 'desc' => 'Stone-ground purity'],
          ['img' => 'p2.png', 'name' => 'Sweeteners', 'desc' => 'Natural alternatives'],
          ];
          @endphp
          @foreach ($fallbackProducts as $item)
          <div class="product-card">
            <img src="{{ asset('images/'.$item['img']) }}" alt="{{ $item['name'] }}" class="product-card-img">
            <div class="pdt_cnt">
              <div class="pdt_cnt_img">
                <img src="{{ asset('images/fssi.png') }}" alt="fssai">
                <img src="{{ asset('images/qr.png') }}" alt="qr">
              </div>
              <h6>{{ $item['name'] }}</h6>
              <p>{{ $item['desc'] }}</p>
            </div>
          </div>
          @endforeach
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>

<section class="brand-section py-5">
  <div class="container">
    <div class="row g-0">
      <div class="col-lg-8">
        <div class="purity-card">
          <h4>Purity that speaks in every grain.</h4>
          <p class="small">
            Our rice and rice-based products represent traditional farming,
            ethical sourcing, and modern processing.
          </p>
          <div class="row text-center mt-2">
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="icon-box">
                <img src="{{ asset('images/icon1.png') }}" alt="">
                <h6>Source</h6>
                <p>Direct Sourcing from Tribal &amp; Organic Farmers</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="icon-box">
                <img src="{{ asset('images/icon2.png') }}" alt="">
                <h6>Process</h6>
                <p>Cleaned &amp; refined using modern techniques</p>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="icon-box">
                <img src="{{ asset('images/icon3.png') }}" alt="">
                <h6>Quality</h6>
                <p>Tested for purity and consistency</p>
              </div>
            </div>
          </div>
        </div>
        <div class="about-card mt-3">
          <h5>About the Brand</h5>
          <p class="small">
            Founded in 2008, we are an Agri Engineering company rooted in the lush landscapes of Wayanad, Kerala. Our journey began with the cultivation of heirloom traditional rices, grown organically and nurtured by rainwater-fed fields. Over the years, we have expanded our vision to bring authentic, organic, and culturally rich agri products to households across India.
          </p>
          <a href="{{ route('about') }}" class="btn view_btn btn-sm mb-3">View More</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="mission-card mc_top">
          <div class="mission_box">
            <h4>Our Mission</h4>
            <p class="small">
              We aim to preserve traditional farming practices while delivering
              wholesome food products that nourish families and support farmers.
            </p>
          </div>
        </div>
        <div class="mission-card">
          <div class="mission_box">
            <h4 class="mt-2">Our mission is simple</h4>
            <ul>
              <li><span>🌾</span> Protect heirloom varieties for future generations</li>
              <li><span>🤝</span> Empower tribal and organic farming communities</li>
              <li><span>🍴</span> Deliver wholesome, chemical-free food to your table</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="offer-section py-5">
  <div class="container">
    <h4 class="text-white mb-2">What We Offer</h4>
    <p class="text-white mb-4">
      Under our brand “Nature’s Harvest”, we bring you a curated range of organic products.
    </p>
    <div class="owl-carousel offer-carousel">
      <div class="offer-card">
        <div class="img-box"><img src="{{ asset('images/w2.png') }}" alt="Heirloom Rices"></div>
        <div class="offer-content">
          <h6>Heirloom Rices</h6>
          <p>Traditional varieties cultivated in natural environments.</p>
          <a href="{{ route('products') }}">View More</a>
        </div>
      </div>
      <div class="offer-card">
        <div class="img-box"><img src="{{ asset('images/w3.png') }}" alt="Millets"></div>
        <div class="offer-content">
          <h6>Millets</h6>
          <p>Nutrient-dense grains for modern healthy living.</p>
          <a href="{{ route('products') }}">View More</a>
        </div>
      </div>
      <div class="offer-card">
        <div class="img-box"><img src="{{ asset('images/w4.png') }}" alt="Pulses"></div>
        <div class="offer-content">
          <h6>Pulses</h6>
          <p>Protein-rich staples sourced from trusted farms.</p>
          <a href="{{ route('products') }}">View More</a>
        </div>
      </div>
      <div class="offer-card">
        <div class="img-box"><img src="{{ asset('images/w5.png') }}" alt="Sweeteners"></div>
        <div class="offer-content">
          <h6>Sweeteners</h6>
          <p>Natural jaggery, dates, and other healthy options.</p>
          <a href="{{ route('products') }}">View More</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="testimonial-section">
  <div class="testimonial-overlay">
    <div class="container">
      <div class="quote-icon mx-auto">
        <img src="{{ asset('images/Vector.svg') }}" class="quote" alt="">
      </div>
      <h5 class="text-center">Testimonials</h5>
      <div class="owl-carousel testimonial-carousel">
        @forelse ($testimonials as $testimonial)
        <div class="testimonial-item text-center">
          <p class="testimonial-text">{{ $testimonial->message }}</p>
          <img src="{{ $testimonial->photo_url }}" class="testimonial-img" alt="{{ $testimonial->name }}">
          <h6 class="mt-3 mb-0">{{ $testimonial->name }}</h6>
          <small>{{ $testimonial->location }}</small>
        </div>
        @empty
        <div class="testimonial-item text-center">
          <p class="testimonial-text">
            Heritage sugar and rice have become a regular part of our kitchen.
            The quality is consistent, clean, and you can really feel the
            difference in taste &amp; purity.
          </p>
          <img src="{{ asset('images/testi.png') }}" class="testimonial-img" alt="Client">
          <h6 class="mt-3 mb-0">Gokul Das</h6>
          <small>Calicut</small>
        </div>
        <div class="testimonial-item text-center">
          <p class="testimonial-text">
            Pure ingredients and authentic taste. We trust these products for
            our family’s daily cooking.
          </p>
          <img src="{{ asset('images/testi.png') }}" class="testimonial-img" alt="Client">
          <h6 class="mt-3 mb-0">Anitha S</h6>
          <small>Kochi</small>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

<section id="quality" class="quality-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h4>Quality Assurance</h4>
        <p class="small text-muted">
          Since 2019, we have conducted random quality testing to double-check
          the purity and safety of our products. Starting December 2025,
          every lot of sweeteners will undergo mandatory quality checks,
          with results transparently uploaded to our website for your
          confidence and trust.
        </p>
        <h6 class="mt-2 mb-2 why_title">Why Choose Us</h6>
        <ul class="quality-list">
          <li>100% Organic &amp; Rainwater Cultivation</li>
          <li>Direct Sourcing from Tribal &amp; Organic Farmers</li>
          <li>Transparent Quality Testing</li>
          <li>Authentic Heirloom Varieties</li>
        </ul>
      </div>
      <div class="col-lg-6 text-center mt-4 mt-lg-0">
        <div class="img-box">
          <img src="{{ asset('images/quality.png') }}" alt="Quality Assurance" class="img-fluid quality-img">
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $(".product-carousel").owlCarousel({
      loop: true,
      margin: 15,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        },
        992: {
          items: 3
        }
      }
    });
    $(".offer-carousel").owlCarousel({
      loop: true,
      margin: 15,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3500,
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        992: {
          items: 4
        }
      }
    });
    $(".testimonial-carousel").owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      dots: true,
      nav: true
    });
  });
</script>
@endpush