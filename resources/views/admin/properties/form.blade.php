@extends('layout.admin')

@section('title', $property->exists ? 'Editer le bien' : 'Ajouter un bien')

@section('content')
<!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Tableau de Bord</h1>
                    @if($property->exists)
                        <h2>Modifier un bien immobilier</h2>
                    @else
                        <h2>Ajouter un bien immobilier</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/admin">Home</a></li>
                @if($property->exists)
                    <li class="current">Modifier un bien</li>
                @else
                    <li class="current">Ajouter un bien</li>
                @endif
            </ol>
        </div>
    </nav>
</div><!-- End Page Title -->
<h4>@yield('title')</h4>

<form class="row" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post" enctype="multipart/form-data">
    @method($property->exists ? 'put' : 'post')
    @csrf
    
    <x-input class="col-md-6" name="title" :value="$property->title" label="Titre" />
    <x-input class="col-md-3" type="number" name="surface" :value="$property->surface" label="Surface" />
    <x-input class="col-md-3" name="price" :value="$property->price" label="Prix" />
    <x-input type="textarea" name="description" :value="$property->description" />
    <x-input class="col-md-3" type="number" name="rooms" :value="$property->rooms" label="Pièces" />
    <x-input class="col-md-3" type="number" name="bedrooms" :value="$property->bedrooms" label="Chambres" />
    <x-input class="col-md-3" type="number" name="baths" :value="$property->baths" label="Douches" />
    <x-input class="col-md-3" type="number" name="floor" :value="$property->floor" label="Etage" />
    <x-input class="col-md-6" name="address" :value="$property->address" label="Adresse" />
    <x-input class="col-md-3" name="city" :value="$property->city" label="Ville" />
    <x-input class="col-md-3" name="postal_code" :value="$property->postal_code" label="Code postal" />
    <x-input class="col-md-6" name="property_type" :value="$property->property_type" label="Type d'immobilier" />
    <div class="col-md-12">
        <label for="map">Localisation</label>
        <input type="text" id="search" placeholder="Rechercher une adresse..." class="form-control mb-3" hidden>
        <div id="map" style="height: 400px; width: 100%;"></div>
        <x-input type="hidden" name="latitude" id="latitude" :value="$property->latitude" />
        <x-input type="hidden" name="longitude" id="longitude" :value="$property->longitude" />
    </div>
    <x-checkbox class="m-3" name="sold" label="Vendu" :value="$property->sold" />
    <x-select class="col-md-12" name="options" :value="$property->options()->pluck('id')" :options="$options" multiple="true" />
    <x-input class="col-md-12" name="pictures" label="Images" type="file" multiple/>
    <div class="d-flex justify-content-center">
        @if (request()->route()->getName() === 'admin.property.edit')
            <button type="submit" class="btn btn-warning m-2">Modifier</button>
            <a href="{{ route('admin.property.index') }}" class="btn btn-secondary m-2">Annuler</a>
        @else
            <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
            <button type="reset" class="btn btn-secondary m-2">Vider les champs</button>
        @endif
    </div>
</form>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialisation de la carte
        var map = L.map('map').setView([{{ $property->latitude ?? 3.8480 }}, {{ $property->longitude ?? 11.5021 }}], 13);

        // Ajuster la taille de la carte à la largeur de la page
        document.getElementById('map').style.width = '100%';

        // Ajouter une couche de carte (vous pouvez utiliser OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter un marqueur à la position actuelle (le cas échéant)
        var marker;
        if ({{ $property->latitude ?? 'null' }} && {{ $property->longitude ?? 'null' }}) {
            marker = L.marker([{{ $property->latitude }}, {{ $property->longitude }}]).addTo(map);
        }

        // Événement de clic sur la carte
        map.on('click', function (e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            
            // Mettre à jour les champs de formulaire
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            
            // Déplacer le marqueur ou en ajouter un nouveau
            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }
        });

        // Ajouter la barre de recherche
        var geocoder = L.Control.Geocoder.nominatim();
        var control = L.Control.geocoder({
            query: '',
            placeholder: 'Rechercher une adresse...',
            defaultMarkGeocode: false
        })
        .on('markgeocode', function(e) {
            var latlng = e.geocode.center;
            map.setView(latlng, 13);
            // Mettre à jour les champs de formulaire
            document.getElementById('latitude').value = latlng.lat;
            document.getElementById('longitude').value = latlng.lng;
            
            // Déplacer le marqueur ou en ajouter un nouveau
            if (marker) {
                marker.setLatLng(latlng);
            } else {
                marker = L.marker(latlng).addTo(map);
            }
        })
        .addTo(map);

        // Ajouter la recherche par adresse
        var searchBox = document.getElementById('search');
        L.DomEvent.addListener(searchBox, 'blur', function() {
            geocoder.geocode(searchBox.value, function(results) {
                var result = results[0];
                if (result) {
                    var latlng = result.center;
                    map.setView(latlng, 13);
                    // Mettre à jour les champs de formulaire
                    document.getElementById('latitude').value = latlng.lat;
                    document.getElementById('longitude').value = latlng.lng;
                    
                    // Déplacer le marqueur ou en ajouter un nouveau
                    if (marker) {
                        marker.setLatLng(latlng);
                    } else {
                        marker = L.marker(latlng).addTo(map);
                    }
                }
            });
        });
    });
</script>

@endsection
