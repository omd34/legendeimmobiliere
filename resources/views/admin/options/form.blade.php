@extends('layout.admin')

@section('title', $option->exists ? 'Editer l\'option' : 'Ajouter une option')

@section('content')
<!-- Page Title -->
<div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              @if($option->exists)
                <h1>MODIFIER D'UN MOT CLE</h1>
                <h2>Changer un mot clé déja défini</h2>
              @else
                <h1>AJOUT D'UN MOT CLE</h1>
                <h2>Ajouter un nouveau mot clé</h2>
              @endif  
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/admin">Home</a></li>
            @if($option->exists)
             <li class="current">Modification Mot clé</li>
            @else
             <li class="current">Ajout Mot clé</li>
            @endif 
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
    <h4>@yield('title')</h4>

    <form class="row" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post" enctype="multipart/form-data">
      @method($option->exists ? 'put' : 'post')
      @csrf
      
      <x-input class="col-md-12" label="Nom" name="name" :value="$option->name" />
      
      <div class="d-flex justify-content-center">
        @if (request()->route()->getName() === 'admin.option.edit')
          <button type="submit" class="btn btn-warning m-2">Modifier</button>
          <a href="{{ route('admin.option.index') }}" class="btn btn-secondary m-2">Annuler</a>
        @else
          <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
          <button type="reset" class="btn btn-secondary m-2">Annuler</button>
        @endif
      </div>
    </form>

@endsection