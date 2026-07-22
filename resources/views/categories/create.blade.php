@extends('layouts.crud')
@section('content')
<h2>Nouvelle catégorie</h2>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Libellé</label>
        <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}">
        @error('libelle') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <button class="btn btn-primary">Enregistrer</button>
</form>
@endsection