<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('service.prestataire')->orderBy('date_reservation')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $services = Service::with('prestataire')->orderBy('titre')->get();
        return view('reservations.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_client' => 'required|string|max:255',
            'email_client' => 'required|email|max:255',
            'date_reservation' => 'required|date',
            'statut' => 'required|in:en_attente,confirmee,annulee',
            'service_id' => 'required|exists:services,id',
        ]);

        Reservation::create($validated);

        return redirect()->route('reservations.index')->with('success', 'Réservation ajoutée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load('service.prestataire');
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $services = Service::with('prestataire')->orderBy('titre')->get();
        return view('reservations.edit', compact('reservation', 'services'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'nom_client' => 'required|string|max:255',
            'email_client' => 'required|email|max:255',
            'date_reservation' => 'required|date',
            'statut' => 'required|in:en_attente,confirmee,annulee',
            'service_id' => 'required|exists:services,id',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }
}
