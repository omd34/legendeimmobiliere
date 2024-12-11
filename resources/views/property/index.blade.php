@extends('layout.layout')

@section('title', "Les biens | LegendeImmobiliere")

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
          <div class="bg-light p-5 text-center">
          <form action="" method="get" class="container">
            <div class="mb-3">
              <input type="number" name="surface" value="{{ $input['surface'] ?? '' }}" class="form-control" placeholder="Surface min">
            </div>
            <div class="mb-3">
              <input type="number" name="rooms" value="{{ $input['rooms'] ?? '' }}" class="form-control" placeholder="Pièces min">
            </div>
            <div class="mb-3">
              <input type="number" name="price" value="{{ $input['price'] ?? '' }}" class="form-control" placeholder="Budget max">
            </div>
            <div class="mb-3">
              <input type="text" name="title" value="{{ $input['title'] ?? '' }}" class="form-control" placeholder="Mot clef">
            </div>
            <button class="btn btn-primary btn-sm">Rechercher</button>
          </form>
        </div>

          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Toutes les proprietes</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->


  

  <section id="real-estate" class="real-estate section">
  <div class="container">
    <h2>Tous nos biens</h2>
    <div class="row gy-4">
      @forelse ($properties as $property)
          @include('property.card')
      @empty
      <p class="text-center text-secondary">Pas de biens correspond à vos besoins</p>
      @endforelse
    </div>
    {{ $properties->links() }}
  </div>
</section>

  
@endsection