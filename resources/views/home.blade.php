@extends('layout.layout')

@section('title', 'Accueil')

@section('content')
  <div class="bg-light p-5 mb-5 text-center">
    <div class="container">
      <h1>LegendeImmobiliere</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi accusantium culpa ratione, laboriosam recusandae dolor sunt nihil deserunt unde perferendis quis, animi, ad in sequi asperiores nam provident commodi cumque!
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