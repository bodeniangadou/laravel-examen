<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gestion JT') }}</title>

    <!-- MDBootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.0.0/css/mdb.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex flex-column align-items-center justify-content-center min-vh-100">

        <!-- Logo / Titre -->
        <div class="mb-4">
            <a href="/" class="text-decoration-none">
                <h3 class="text-dark fw-bold">Gestion JT</h3>
            </a>
        </div>

        <!-- Carte du formulaire -->
        <div class="card shadow-sm" style="max-width: 420px; width: 100%;">
            <div class="card-body p-4">
                {{ $slot }}
            </div>
        </div>

    </div>

    <!-- MDBootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.0.0/js/mdb.umd.min.js"></script>
</body>
</html>