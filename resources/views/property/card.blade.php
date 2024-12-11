<div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
  <div class="card">
    @php
      $pic = $property->pictures()->first();
    @endphp
    <img src="{{ $pic ? $pic->pictureUrl() : asset('assets/img/apartement.jpg') }}" alt="{{ $property->title }} image" class="img-fluid">
    <div class="card-body">
      <span class="sale-rent">{{ $property->is_for_sale ? 'Sale' : 'Rent' }} | {{ number_format($property->price, 2, '.', ' ') }} DH</span>
      <h3><a href="{{ route('property.show', ['slug'=> $property->getSlug(), 'property'=> $property->id]) }}" class="stretched-link">{{ $property->title }}</a></h3>
      <div class="card-content d-flex flex-column justify-content-center text-center">
        <div class="row propery-info">
          <div class="col">Area</div>
          <div class="col">Beds</div>
          <div class="col">Baths</div>
          <div class="col">Garages</div>
        </div>
        <div class="row">
          <div class="col">{{ $property->surface }} m²</div>
          <div class="col">{{ $property->bedrooms }}</div>
          <div class="col">{{ $property->bathrooms }}</div>
          <div class="col">{{ $property->garages }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
