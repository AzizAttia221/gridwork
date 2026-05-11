<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    public function index()
    {
        $prestataires = Prestataire::orderBy('nom')->get();
        return view('prestataires.index', compact('prestataires'));
    }

    public function create()
    {
        return view('prestataires.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:prestataires,email',
            'telephone' => 'required|string|max:50',
            'ville' => 'required|string|max:100',
        ]);

        Prestataire::create($validated);

        return redirect()->route('prestataires.index')->with('success', 'Prestataire ajouté avec succès.');
    }

    public function show(Prestataire $prestataire)
    {
        $prestataire->load('services');
        return view('prestataires.show', compact('prestataire'));
    }

    public function edit(Prestataire $prestataire)
    {
        return view('prestataires.edit', compact('prestataire'));
    }

    public function update(Request $request, Prestataire $prestataire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:prestataires,email,' . $prestataire->id,
            'telephone' => 'required|string|max:50',
            'ville' => 'required|string|max:100',
        ]);

        $prestataire->update($validated);

        return redirect()->route('prestataires.index')->with('success', 'Prestataire mis à jour avec succès.');
    }

    public function destroy(Prestataire $prestataire)
    {
        $prestataire->delete();

        return redirect()->route('prestataires.index')->with('success', 'Prestataire supprimé avec succès.');
    }
}
