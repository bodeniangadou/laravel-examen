<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Edition;

class EditionController extends Controller
{
    public function index() {
        $editions = Edition::withCount('reportages')->get();
        return view('editions.index', compact('editions'));
    }

    public function create() {
        return view('editions.create');
    }

    public function store(Request $request) {
        $request->validate([
            'date_diffusion' => 'required|date',
            'heure_diffusion' => 'required',
            'type_edition' => 'required|string',
            'duree_max_minutes' => 'required|integer|min:1',
        ]);
        Edition::create($request->all());
        return redirect()->route('editions.index')->with('success', 'Édition créée.');
    }

    public function edit(Edition $edition) {
        return view('editions.edit', compact('edition'));
    }

    public function update(Request $request, Edition $edition) {
        $request->validate([
            'date_diffusion' => 'required|date',
            'heure_diffusion' => 'required',
            'type_edition' => 'required|string',
            'duree_max_minutes' => 'required|integer|min:1',
        ]);
        $edition->update($request->all());
        return redirect()->route('editions.index')->with('success', 'Édition modifiée.');
    }

    public function destroy(Edition $edition) {
        $edition->delete();
        return redirect()->route('editions.index')->with('success', 'Édition supprimée.');
    }

    public function updateStatut(Request $request, Edition $edition) {
        $dureeTotale = $edition->reportages()->sum('duree_minutes');
        if ($request->statut === 'Validé' && $dureeTotale > $edition->duree_max_minutes) {
            return redirect()->route('editions.index')->with('error', 'Durée totale dépassée : ' . $dureeTotale . ' min / ' . $edition->duree_max_minutes . ' min max.');
        }
        $edition->update(['statut' => $request->statut]);
        return redirect()->route('editions.index')->with('success', 'Statut mis à jour.');
    }
}