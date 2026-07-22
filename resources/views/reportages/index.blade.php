@extends('layouts.crud')
@section('content')
<h2>Reportages</h2>
<a href="{{ route('reportages.create') }}" class="btn btn-primary mb-3">+ Nouveau reportage</a>
<table class="table table-striped">
    <thead><tr><th>Pos</th><th>Titre</th><th>Catégorie</th><th>Durée</th><th>Journaliste</th><th>Édition</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($reportages as $r)
        <tr>
            <td>{{ $r->position }}</td>
            <td>{{ $r->titre }}</td>
            <td>{{ $r->categorie->libelle }}</td>
            <td>{{ $r->duree_minutes }} min</td>
            <td>{{ $r->journaliste->prenom }} {{ $r->journaliste->nom }}</td>
            <td>{{ $r->edition->type_edition }} - {{ $r->edition->date_diffusion }}</td>
            <td>
                <form action="{{ route('reportages.up', $r) }}" method="POST" style="display:inline">
                    @csrf @method('PUT')
                    <button class="btn btn-sm btn-secondary">↑</button>
                </form>
                <form action="{{ route('reportages.down', $r) }}" method="POST" style="display:inline">
                    @csrf @method('PUT')
                    <button class="btn btn-sm btn-secondary">↓</button>
                </form>
                <a href="{{ route('reportages.edit', $r) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('reportages.destroy', $r) }}" method="POST" style="display:inline" onsubmit="return confirm('Confirmer la suppression de {{ $r->titre }} ?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection