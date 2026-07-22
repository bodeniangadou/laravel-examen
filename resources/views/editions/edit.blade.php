@extends('layouts.crud')
@section('content')
<h2>Modifier édition</h2>
<form action="{{ route('editions.update', $edition) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Date de diffusion</label>
        <input type="date" name="date_diffusion" class="form-control @error('date_diffusion') is-invalid @enderror" value="{{ old('date_diffusion', $edition->date_diffusion) }}">
        @error('date_diffusion') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Heure de diffusion</label>
        <input type="time" name="heure_diffusion" class="form-control @error('heure_diffusion') is-invalid @enderror" value="{{ old('heure_diffusion', $edition->heure_diffusion) }}">
        @error('heure_diffusion') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Type d'édition</label>
        <select name="type_edition" class="form-control @error('type_edition') is-invalid @enderror">
            <option value="Matin" @selected($edition->type_edition == 'Matin')>Matin</option>
            <option value="Midi" @selected($edition->type_edition == 'Midi')>Midi</option>
            <option value="Soir" @selected($edition->type_edition == 'Soir')>Soir</option>
        </select>
        @error('type_edition') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label>Durée max (minutes)</label>
        <input type="number" name="duree_max_minutes" class="form-control @error('duree_max_minutes') is-invalid @enderror" value="{{ old('duree_max_minutes', $edition->duree_max_minutes) }}">
        @error('duree_max_minutes') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-primary">Enregistrer</button>
</form>
@endsection