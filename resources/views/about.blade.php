{{-- resources/views/about.blade.php --}}

@extends('layout.app')

@section('title', 'About Us | Av2 Agro')

@section('content')

{{-- Inner Banner --}}
<section class="about-section">
    <img src="{{ asset('images/aboutbnr.png') }}" class="d-block w-100" alt="About Av2 Agro">
    <div class="inner_bnr_caption">
        <h1>About Us</h1>
    </div>
</section>


{{-- About Content --}}
<section class="about">
    <div class="container">
        <div class="row align-items-center">

            {{-- Left Image --}}
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="img-box">
                    <img src="{{ asset('images/about.png') }}" class="img-fluid rounded-end" alt="About Av2 Agro">
                </div>
            </div>

            {{-- Right Content --}}
            <div class="col-lg-6">
                <h4>Purity that speaks in every grain.</h4>

                <p class="small mt-2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                    only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                </p>

                <p class="small mt-2">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <h6 class="mt-3 mb-2 why_title">Our Objective</h6>
                <p class="small">
                    Our objective is to craft meaningful solutions that elevate identity and improve usability.
                </p>

                <ul class="small mt-2">
                    <li><span>🌾</span> Future Focused</li>
                    <li><span>🌾</span> Quality Craftsmanship</li>
                    <li><span>🌾</span> Smart Solutions</li>
                </ul>
            </div>

        </div>
    </div>
</section>


{{-- Eco-Friendly Section --}}
<section class="eco-section">
    <div class="container">

        {{-- Section Header --}}
        <div class="section-header d-flex justify-content-between align-items-start mb-4">
            <div>
                <span class="section-tag">Green Practices</span>
                <h2>Eco-Friendly Farm<br>Solutions</h2>
            </div>
        </div>

        {{-- Cards --}}
        <div class="row eco-cards g-4">

            {{-- Card 1 --}}
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="eco-card">
                    <div class="media-box">
                        <img src="{{ asset('images/farm-1.png') }}" alt="Environment Friendly" class="w-100 rounded">
                    </div>
                    <h4 class="mt-3">Environment-Friendly</h4>
                    <p class="small mt-2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="eco-card">
                    <div class="media-box">
                        <img src="{{ asset('images/farm-2.png') }}" alt="Sustainable Crop Growth" class="w-100 rounded">
                    </div>
                    <h4 class="mt-3">Sustainable Crop Growth</h4>
                    <p class="small mt-2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="eco-card">
                    <div class="media-box">
                        <img src="{{ asset('images/farm-3.png') }}" alt="Farmed in Fertile Ground" class="w-100 rounded">
                    </div>
                    <h4 class="mt-3">Farmed In Fertile Ground</h4>
                    <p class="small mt-2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="eco-card">
                    <div class="media-box">
                        <img src="{{ asset('images/farm-4.png') }}" alt="Natural Farming" class="w-100 rounded">
                    </div>
                    <h4 class="mt-3">Natural Farming</h4>
                    <p class="small mt-2">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
