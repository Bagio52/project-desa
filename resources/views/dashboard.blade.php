@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('assets/img/Bg.png') }}"
            alt="Sunlit horizon with subtle landscape silhouettes and a soft gradient sky suggesting a coastal or open-field scene; warm, uplifting colors create an inviting, optimistic tone; no readable text in the image"
            data-aos="fade-in">

        <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>Welcome to Desa Ngendrosari</h2>
                    <p>Desa yang penuh keindahan, budaya, dan adat istiadat</p>
                    <a href="{{ route('dashboard') }}#about" class="btn-get-started">Get Started</a>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    @include('about')
    @include('berita')
    @include('galery')
    @include('contact')
@endsection

