@extends('layout.admin')

@section('title', 'Liste des biens')

@section('content')
<!-- Page Title -->
<div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Tableau de Bord</h1>
              <h2>Ajouter, Modifier ou Supprimer un bien immobilier</h2>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/admin">Home</a></li>
            <li class="current">Accueil</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
    <div class="d-sm-flex justify-content-between align-items-start">
      <div>
        <h4 class="card-title card-title-dash title">@yield('title')</h4>
      </div>
      <div>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button" >+ Ajouter un bien</a>
      </div>
    </div>
    <table class="table table-stripped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Surface</th>
          <th>Ville</th>
          <th>Prix</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($properties as $property)
        <tr>
          <td>{{ $property->title }}</td>
          <td>{{ $property->surface }} m²</td>
          <td>{{ $property->city }}</td>
          <td>{{ number_format(num:$property->price, decimals:2, decimal_separator:'.', thousands_separator:' ') }} DH</td>
          <td>
            <div class="d-flex gap-2 w-100 justify-content-end">
              <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-warning btn-sm">Editer</a>
              <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm">Supprimer</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-secondary text-center">Aucun bien disponible</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $properties->links() }}

@endsection

 
      