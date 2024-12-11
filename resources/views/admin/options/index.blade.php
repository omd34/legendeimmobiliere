@extends('layout.admin')

@section('title', 'Liste des options')

@section('content')

   <!-- Page Title -->
   <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>MOTS CLES</h1>
              <h2>Utiliser les mots clés à associer aux biens immobiliers afin de faciliter la recherche d'un bien</h2>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/admin">Home</a></li>
            <li class="current">Mots clés</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <div class="d-sm-flex justify-content-between align-items-start">
      <div>
        <h4 class="card-title card-title-dash title">@yield('title')</h4>
      </div>
      <div>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button" >+ Ajouter une option</a>
      </div>
    </div>
    <table class="table table-stripped">
      <thead>
        <tr>
          <th>Nom</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($options as $option)
        <tr>
          <td>{{ $option->name }}</td>
          <td>
            <div class="d-flex gap-2 w-100 justify-content-end">
              <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-warning btn-sm">Editer</a>
              <form action="{{ route('admin.option.destroy', $option) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm">Supprimer</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-secondary text-center">Aucune option disponible</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    {{ $options->links() }}

@endsection