@extends('layout.layout')

@section('title', "$property->title | IZ")

@section('content')

<!-- Page Title -->
<div class="page-title" data-aos="fade">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>{{ $property->title }}</h1>
          <p class="mb-0">{{ $property->description }}</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('index') }}">Home</a></li>
        <li class="current">{{ $property->title }}</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Real Estate 2 Section -->
<section id="real-estate-2" class="real-estate-2 section">
  <div class="container" data-aos="fade-up">
    <div class="portfolio-details-slider swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "navigation": {
            "nextEl": ".swiper-button-next",
            "prevEl": ".swiper-button-prev"
          },
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          }
        }
      </script>
      <div class="swiper-wrapper align-items-center">
        @forelse ($property->pictures()->get() as $picture)
        
        <div class="swiper-slide">
         <img src="{{ $picture->pictureUrl() }}" alt="{{ $property->title }} image">
        </div>
        @empty
        <div class="swiper-slide">
          <img src="{{ asset('assets/img/apartement.jpg') }}" alt="Default image">
        </div>
        @endforelse
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-pagination"></div>
    </div>

    <div class="row justify-content-between gy-4 mt-4">
      <div class="col-lg-8" data-aos="fade-up">
        <div class="portfolio-description">
          <h2>{{ $property->title }}</h2>
          <p>{!! nl2br($property->description) !!}</p>
          <div class="testimonial-item">
            <p>
              <span>Commentaire sur la propriété.......</span>
            </p>
            <div>
              <img src="{{ asset('assets/img/agent.jpg' }}" class="testimonial-img" alt="">
              <h3>M.Thierry Pekam</h3>
              <h4>Agent Immobilier</h4>
            </div>
          </div>
        </div><!-- End Portfolio Description -->
        <!-- Tabs -->
        <ul class="nav nav-pills mb-3">
          <li><a class="nav-link active" data-bs-toggle="pill" href="#real-estate-2-tab1">Video</a></li>
          <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab2">Floor Plans</a></li>
          <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab3">Location</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="real-estate-2-tab1">
          </div><!-- End Tab 1 Content -->

          <div class="tab-pane fade" id="real-estate-2-tab2">
            <img src="{{ asset('assets/img/floor-plan.jpg') }}" alt="" class="img-fluid">
          </div><!-- End Tab 2 Content -->

          <div class="tab-pane fade" id="real-estate-2-tab3">
            <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="portfolio-info">
          <h3>Quick Summary</h3>
          <ul>
            <li><strong>Property ID:</strong> {{ $property->id }}</li>
            <li><strong>Location:</strong> {{ $property->address }}, {{ $property->city }} ({{ $property->postal_code }})</li>
            <li><strong>Property Type:</strong> {{ $property->type }}</li>
            <li><strong>Status:</strong> {{ $property->is_for_sale ? 'Sale' : 'Rent' }}</li>
            <li><strong>Area:</strong> <span>{{ $property->surface }} m²</span></li>
            <li><strong>Beds:</strong> {{ $property->bedrooms }}</li>
            <li><strong>Baths:</strong> {{ $property->bathrooms }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
