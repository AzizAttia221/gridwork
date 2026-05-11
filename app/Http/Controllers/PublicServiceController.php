<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class PublicServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('prestataire')->get();
        return view('public.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $service->load('prestataire');
        return view('public.services.show', compact('service'));
    }

    public function reserve(Request $request, Service $service)
    {
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'email_client' => 'required|email|max:255',
            'date_reservation' => 'required|date|after:today',
        ]);

        Reservation::create([
            'nom_client' => $request->nom_client,
            'email_client' => $request->email_client,
            'date_reservation' => $request->date_reservation,
            'statut' => 'en_attente',
            'service_id' => $service->id,
        ]);

        return redirect()->route('public.services.show', $service)->with('success', 'Your reservation has been submitted successfully!');
    }
}
