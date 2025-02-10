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

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">@yield('title')</h4>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary btn-sm text-white" type="button">+ Ajouter un bien</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
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
                    <td>{{ number_format($property->price, 2, '.', ' ') }} DH</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-end">
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
    </div>
    {{ $properties->links() }}
</div>
@endsection
