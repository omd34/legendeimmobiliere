@extends('layout.layout')

@section('title', "Les biens | IZ")

@section('content')

  <div class="bg-light p-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
      <input type="number" name="surface" value ="{{ $input['surface'] ?? '' }}" class="form-control" placeholder="Surface min">
      <input type="number" name="rooms" value ="{{ $input['rooms'] ?? '' }}" class="form-control" placeholder="Pièces min">
      <input type="number" name="price" value ="{{ $input['price'] ?? '' }}" class="form-control" placeholder="Budget max">
      <input type="text" name="title" value ="{{ $input['title'] ?? '' }}" class="form-control" placeholder="Mot clef">
      <button class="btn btn-primary btn-sm d-flex grow-0">Rechercher</button>
    </form>
  </div>

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