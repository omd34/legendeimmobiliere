@extends('layout.layout')

@section('title', 'Accueil')

@section('content')
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>LegendeImmobiliere</h1>
              <p class="mb-0">Bonjour comment vous allez ?</div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Accueil</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

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