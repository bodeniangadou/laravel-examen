@extends('layouts.crud')
@section('content')
<h2>Catégories</h2>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Nouvelle</a>
<table class="table table-striped">
    <thead><tr><th>Libellé</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($categories as $c)
        <tr>
            <td>{{ $c->libelle }}</td>
            <td>
                <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('categories.destroy', $c) }}" method="POST" style="display:inline" onsubmit="return confirm('Confirmer la suppression de {{ $c->libelle }} ?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection