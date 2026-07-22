<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Gestion JT') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.0.0/css/mdb.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="max-width: 500px; margin-top: 80px;">
    <div class="card shadow p-4">
        {{ $slot }}
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.0.0/js/mdb.umd.min.js"></script>
</body>
</html>