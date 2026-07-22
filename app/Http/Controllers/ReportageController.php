<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reportage;
use App\Models\Journaliste;
use App\Models\Categorie;
use App\Models\Edition;

class ReportageController extends Controller
{
    public function index() {
        $reportages = Reportage::with(['journaliste', 'categorie', 'edition'])->orderBy('position')->get();
        return view('reportages.index', compact('reportages'));
    }

    public function create() {
        $journalistes = Journaliste::all();
        $categories = Categorie::all();
        $editions = Edition::all();
        return view('reportages.create', compact('journalistes', 'categories', 'editions'));
    }

    public function store(Request $request) {
        $request->validate([
            'titre' => 'required|string|max:255',
            'duree_minutes' => 'required|integer|min:1',
            'journaliste_id' => 'required|exists:journalistes,id',
            'categorie_id' => 'required|exists:categories,id',
            'edition_id' => 'required|exists:editions,id',
        ]);
        $maxPos = Reportage::where('edition_id', $request->edition_id)->max('position') ?? 0;
        $data = $request->all();
        $data['position'] = $maxPos + 1;
        Reportage::create($data);
        return redirect()->route('reportages.index')->with('success', 'Reportage ajouté.');
    }

    public function edit(Reportage $reportage) {
        $journalistes = Journaliste::all();
        $categories = Categorie::all();
        $editions = Edition::all();
        return view('reportages.edit', compact('reportage', 'journalistes', 'categories', 'editions'));
    }

    public function update(Request $request, Reportage $reportage) {
        $request->validate([
            'titre' => 'required|string|max:255',
            'duree_minutes' => 'required|integer|min:1',
            'journaliste_id' => 'required|exists:journalistes,id',
            'categorie_id' => 'required|exists:categories,id',
            'edition_id' => 'required|exists:editions,id',
        ]);
        $reportage->update($request->all());
        return redirect()->route('reportages.index')->with('success', 'Reportage modifié.');
    }

    public function destroy(Reportage $reportage) {
        $reportage->delete();
        return redirect()->route('reportages.index')->with('success', 'Reportage supprimé.');
    }

    public function moveUp(Reportage $reportage) {
        $above = Reportage::where('edition_id', $reportage->edition_id)
            ->where('position', '<', $reportage->position)
            ->orderBy('position', 'desc')->first();
        if ($above) {
            $tmp = $reportage->position;
            $reportage->update(['position' => $above->position]);
            $above->update(['position' => $tmp]);
        }
        return redirect()->route('reportages.index');
    }

    public function moveDown(Reportage $reportage) {
        $below = Reportage::where('edition_id', $reportage->edition_id)
            ->where('position', '>', $reportage->position)
            ->orderBy('position', 'asc')->first();
        if ($below) {
            $tmp = $reportage->position;
            $reportage->update(['position' => $below->position]);
            $below->update(['position' => $tmp]);
        }
        return redirect()->route('reportages.index');
    }
}