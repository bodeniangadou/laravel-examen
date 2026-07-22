<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestion JT')</title>
    <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.0.0/css/mdb.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('reportages.index') }}">Gestion JT</a>
        <div class="navbar-nav me-auto">
            @auth
                <a class="nav-link text-white" href="{{ route('reportages.index') }}">Reportages</a>
                @if(auth()->user()->role === 'admin')
                    <a class="nav-link text-white" href="{{ route('editions.index') }}">Éditions</a>
                    <a class="nav-link text-white" href="{{ route('journalistes.index') }}">Journalistes</a>
                    <a class="nav-link text-white" href="{{ route('categories.index') }}">Catégories</a>
                @endif
            @endauth
        </div>
        <div class="navbar-nav">
            @auth
<a class="nav-link text-white" href="{{ route('profile.edit') }}">{{ auth()->user()->name }} ({{ auth()->user()->role }})</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-outline-light">Déconnexion</button>
                </form>
            @else
                <a class="nav-link text-white" href="{{ route('login') }}">Connexion</a>
                <a class="nav-link text-white" href="{{ route('register') }}">Inscription</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.0.0/js/mdb.umd.min.js"></script>
</body>
</html>