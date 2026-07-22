@extends('layouts.crud')
@section('content')
<h2>Modifier journaliste</h2>
<form action="{{ route('journalistes.update', $journaliste) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $journaliste->nom) }}">
        @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom', $journaliste->prenom) }}">
        @error('prenom') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Spécialité</label>
        <input type="text" name="specialite" class="form-control" value="{{ old('specialite', $journaliste->specialite) }}">
    </div>
    <button class="btn btn-primary">Enregistrer</button>
</form>
@endsection