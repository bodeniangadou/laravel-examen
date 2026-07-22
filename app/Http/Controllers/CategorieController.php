<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index() {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $request->validate(['libelle' => 'required|string|max:255']);
        Categorie::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée.');
    }

    public function edit(Categorie $categorie) {
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie) {
        $request->validate(['libelle' => 'required|string|max:255']);
        $categorie->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Catégorie modifiée.');
    }

    public function destroy(Categorie $categorie) {
        if ($categorie->reportages()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Impossible : reportages liés.');
        }
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}