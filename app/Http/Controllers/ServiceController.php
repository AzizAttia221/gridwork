<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('prestataire')->orderBy('titre')->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $prestataires = Prestataire::orderBy('nom')->get();
        return view('services.create', compact('prestataires'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'prestataire_id' => 'required|exists:prestataires,id',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service ajouté avec succès.');
    }

    public function show(Service $service)
    {
        $service->load('prestataire', 'reservations');
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $prestataires = Prestataire::orderBy('nom')->get();
        return view('services.edit', compact('service', 'prestataires'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'prestataire_id' => 'required|exists:prestataires,id',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
