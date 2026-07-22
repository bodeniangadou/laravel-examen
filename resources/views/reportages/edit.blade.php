@extends('layouts.crud')
@section('content')
<h2>Modifier reportage</h2>
<form action="{{ route('reportages.update', $reportage) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Titre</label>
        <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre', $reportage->titre) }}">
        @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $reportage->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label>Durée (minutes)</label>
        <input type="number" name="duree_minutes" class="form-control @error('duree_minutes') is-invalid @enderror" value="{{ old('duree_minutes', $reportage->duree_minutes) }}">
        @error('duree_minutes') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Journaliste</label>
        <select name="journaliste_id" class="form-control @error('journaliste_id') is-invalid @enderror">
            <option value="">-- choisir --</option>
            @foreach($journalistes as $j)
                <option value="{{ $j->id }}" @selected($reportage->journaliste_id == $j->id)>{{ $j->prenom }} {{ $j->nom }}</option>
            @endforeach
        </select>
        @error('journaliste_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Catégorie</label>
        <select name="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror">
            <option value="">-- choisir --</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}" @selected($reportage->categorie_id == $c->id)>{{ $c->libelle }}</option>
            @endforeach
        </select>
        @error('categorie_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Édition</label>
        <select name="edition_id" class="form-control @error('edition_id') is-invalid @enderror">
            <option value="">-- choisir --</option>
            @foreach($editions as $e)
                <option value="{{ $e->id }}" @selected($reportage->edition_id == $e->id)>{{ $e->type_edition }} - {{ $e->date_diffusion }}</option>
            @endforeach
        </select>
        @error('edition_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-primary">Enregistrer</button>
</form>
@endsection