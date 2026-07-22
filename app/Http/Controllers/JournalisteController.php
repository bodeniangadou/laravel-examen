<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Journaliste;

class JournalisteController extends Controller
{
   public function index() {
    $journalistes = Journaliste::with('user')->get();
    return view('journalistes.index', compact('journalistes'));
}
    public function create() {
        return view('journalistes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255',
        ]);
        Journaliste::create($request->all());
        return redirect()->route('journalistes.index')->with('success', 'Journaliste ajouté.');
    }

    public function edit(Journaliste $journaliste) {
        return view('journalistes.edit', compact('journaliste'));
    }

    public function update(Request $request, Journaliste $journaliste) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'nullable|string|max:255',
        ]);
        $journaliste->update($request->all());
        return redirect()->route('journalistes.index')->with('success', 'Journaliste modifié.');
    }

    public function destroy(Journaliste $journaliste) {
        if ($journaliste->reportages()->count() > 0) {
            return redirect()->route('journalistes.index')->with('error', 'Impossible : reportages liés.');
        }
        $journaliste->delete();
        return redirect()->route('journalistes.index')->with('success', 'Journaliste supprimé.');
    }
}