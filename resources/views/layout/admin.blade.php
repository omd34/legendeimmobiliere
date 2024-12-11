<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <title>@yield('title') . Administration</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>
<body>
@php
    $routeName = request()->route();
@endphp
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    <a href="{{ route('admin.index') }}" class="logo d-flex align-items-center">
      <h1 class="sitename">Agence<span>Immobilière</span></h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a @class(['nav-link', 'active' => $routeName->getName() === 'admin.index']) href="{{ route('admin.index') }}">Accueil</a></li>
        <li><a @class(['nav-link', 'active' => $routeName->getName() === 'admin.property.index']) href="{{ route('admin.property.index') }}">Les biens</a></li>
        <li><a @class(['nav-link', 'active' => $routeName->getName() === 'admin.option.index']) href="{{ route('admin.option.index') }}">Les options</a></li>
        <li class="dropdown">
          <a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
          {{ Illuminate\Support\Facades\Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <form action="{{ route('logout') }}" method="post">
            @method("delete")
            @csrf
            <button class="nav-link" type="submit">Se déconnecter</button>
          </form>
        </ul>
      </li>
    </ul>
  </div>
</header>
<main class="main">
  <div class="container mt-5">
    @if (session('success'))
      <x-alert>{{ session('success') }}</x-alert>
    @endif
    @if (session('error'))
      <x-alert type="danger">{{ session('error') }}</x-alert>
    @endif
    @if ($errors->any())
    <x-alert type="danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </x-alert>
    @endif
    @yield('content')
  </div>  
</main>  
</body>
</html>