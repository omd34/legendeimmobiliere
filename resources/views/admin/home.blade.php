@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Tableau de Bord</h1>
              <h2>Bienvenue, M.{{ Illuminate\Support\Facades\Auth::user()->name }}</h2>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/admin">Home</a></li>
            <li class="current">Tableau de bord</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
    <section id="real-estate" class="real-estate section">

      <div class="container">

        <div class="row gy-4">
         
       </div>
      </div>
   </section>    
@endsection
