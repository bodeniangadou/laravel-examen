@extends('layouts.crud')
@section('content')
<h2>Éditions</h2>
<a href="{{ route('editions.create') }}" class="btn btn-primary mb-3">+ Nouvelle</a>
<table class="table table-striped">
    <thead><tr><th>Date</th><th>Heure</th><th>Type</th><th>Durée max</th><th>Statut</th><th>Nb reportages</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($editions as $e)
        <tr>
            <td>{{ $e->date_diffusion }}</td>
            <td>{{ $e->heure_diffusion }}</td>
            <td>{{ $e->type_edition }}</td>
            <td>{{ $e->duree_max_minutes }} min</td>
            <td>
                <form action="{{ route('editions.updateStatut', $e) }}" method="POST" style="display:inline">
                    @csrf @method('PUT')
                    <select name="statut" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="Brouillon" @selected($e->statut == 'Brouillon')>Brouillon</option>
                        <option value="Validé" @selected($e->statut == 'Validé')>Validé</option>
                        <option value="Diffusé" @selected($e->statut == 'Diffusé')>Diffusé</option>
                    </select>
                </form>
            </td>
            <td>{{ $e->reportages_count }}</td>
            <td>
                <a href="{{ route('editions.edit', $e) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('editions.destroy', $e) }}" method="POST" style="display:inline" onsubmit="return confirm('Confirmer la suppression de cette édition ?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection