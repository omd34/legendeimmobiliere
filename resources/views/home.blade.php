@extends('layout.layout')

@section('title', 'Accueil')

@section('content')
  <div class="bg-light p-5 mb-5 text-center">
    <div class="container">
      <h1>LegendeImmobiliere</h1>
      <p>
       Bonjour comment vous allez ?
    </p>
    </div>
  </div>

  <section id="real-estate" class="real-estate section">

      <div class="container">

        <div class="row gy-4">
          @foreach ($properties as $property)
              @include('property.card')
          @endforeach
       </div>
      </div>
   </section>    
@endsection