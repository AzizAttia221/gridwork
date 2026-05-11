@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="section-title">Créer une réservation</div>
        <p style="color: rgba(255,255,255,.72); margin-bottom: 24px;">Réservez un service local avec un style neon.</p>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="nom_client">Nom du client</label>
                <input type="text" id="nom_client" name="nom_client" value="{{ old('nom_client') }}" required>
                @error('nom_client')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="email_client">Email du client</label>
                <input type="email" id="email_client" name="email_client" value="{{ old('email_client') }}" required>
                @error('email_client')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="date_reservation">Date</label>
                <input type="date" id="date_reservation" name="date_reservation" value="{{ old('date_reservation') }}" required>
                @error('date_reservation')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="statut">Statut</label>
                <select id="statut" name="statut" required>
                    <option value="en_attente" @selected(old('statut') == 'en_attente')>En attente</option>
                    <option value="confirmee" @selected(old('statut') == 'confirmee')>Confirmée</option>
                    <option value="annulee" @selected(old('statut') == 'annulee')>Annulée</option>
                </select>
                @error('statut')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="service_id">Service</label>
                <select id="service_id" name="service_id" required>
                    <option value="">Sélectionnez un service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>{{ $service->titre }} — {{ $service->prestataire->nom ?? 'Prestataire inconnu' }}</option>
                    @endforeach
                </select>
                @error('service_id')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div style="display:flex; gap: 14px; flex-wrap: wrap; align-items:center; margin-top: 10px;">
                <button type="submit" class="button">Enregistrer</button>
                <a href="{{ route('reservations.index') }}" class="button" style="background: rgba(0,0,0,.55); border-color: rgba(0,255,245,.45);">Retour</a>
            </div>
        </form>
    </div>
@endsection
