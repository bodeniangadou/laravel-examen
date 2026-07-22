@extends('layouts.crud')
@section('content')
<h2>Journalistes</h2>
<p class="text-muted">Les journalistes sont créés automatiquement lors de leur inscription sur le site.</p>
<table class="table table-striped">
    <thead><tr><th>Nom</th><th>Prénom</th><th>Spécialité</th><th>Email</th><th>Nom d'utilisateur</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($journalistes as $j)
        <tr>
            <td>{{ $j->nom }}</td>
            <td>{{ $j->prenom }}</td>
            <td>{{ $j->specialite ?? '-' }}</td>
            <td>{{ $j->user->email ?? 'Aucun compte lié' }}</td>
            <td>{{ $j->user->name ?? '-' }}</td>
            <td>
                <form action="{{ route('journalistes.destroy', $j) }}" method="POST" style="display:inline" onsubmit="return confirm('Confirmer la suppression de {{ $j->nom }} {{ $j->prenom }} ?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection