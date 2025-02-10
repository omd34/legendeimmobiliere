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
              <img src="{{ asset('assets/img/agent.jpg') }}" class="testimonial-img" alt="">
              <h3>M.Thierry Pekam</h3>
              <h4>Agent Immobilier</h4>
            </div>
          </div>
          <!-- Bouton Nous Contacter -->
          @php
          $whatsappMessage = urlencode("J'aimerai en savoir plus je suis interessé par la propriété : $property->title");
          $whatsappImages = $property->pictures->take(1)->pluck('pictureUrl')->implode('%0A');
          @endphp
          <div class="mt-3">
            <a href="https://wa.me/237679091819?text={{ $whatsappMessage }}%0A{{ $whatsappImages }}" class="btn btn-primary" target="_blank">Nous Contacter</a>
          </div>
        </div><!-- End Portfolio Description -->
        <!-- Tabs -->
        <ul class="nav nav-pills mb-3">
          <li><a class="nav-link active" data-bs-toggle="pill" href="#real-estate-2-tab1">Video</a></li>
          <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab2">Plan de la maison</a></li>
          <li><a class="nav-link" data-bs-toggle="pill" href="#real-estate-2-tab3">Localisation</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="real-estate-2-tab1">
          </div><!-- End Tab 1 Content -->

          <div class="tab-pane fade" id="real-estate-2-tab2">
            <img src="{{ asset('assets/img/floor-plan.jpg') }}" alt="" class="img-fluid">
          </div><!-- End Tab 2 Content -->
          <div class="tab-pane fade" id="real-estate-2-tab3">
              <div id="map" style="height: 400px; width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="portfolio-info">
          <h3>DESCRIPTION</h3>
          <ul>
            <li><strong>Localisation:</strong> {{ $property->address }}, {{ $property->city }} ({{ $property->postal_code }})</li>
            <li><strong>Type de la propriete:</strong> {{ $property->property_type }}</li>
            <li><strong>Statut:</strong> {{ $property->is_for_sale ? 'Vendu' : 'En vente' }}</li>
            <li><strong>Aire:</strong> <span>{{ $property->surface }} m²</span></li>
            <li><strong>Nombres de chambres:</strong> {{ $property->bedrooms }}</li>
            <li><strong>Nombres de salle de bain:</strong> {{ $property->baths }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<script src="https://cdn.jsdelivr.net/npm/maplibre-gl@1.15.2/dist/maplibre-gl.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialiser la carte avec Leaflet et OpenStreetMap
        var map = L.map('map').setView([{{ $property->latitude }}, {{ $property->longitude }}], 15);

        // Utiliser un calque de tuiles satellite
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter un marqueur à la position de la propriété
        var marker = L.marker([{{ $property->latitude }}, {{ $property->longitude }}]).addTo(map)
            .bindPopup(`{{ $property->title }}<br>{{ $property->address }}`)
            .openPopup();
    });
</script>
@endsection
