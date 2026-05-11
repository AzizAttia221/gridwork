@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="section-title">Modifier la réservation</div>
        <p style="color: rgba(255,255,255,.72); margin-bottom: 24px;">Ajustez la réservation du client dans l'interface cyberpunk.</p>

        <form action="{{ route('reservations.update', $reservation) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="nom_client">Nom du client</label>
                <input type="text" id="nom_client" name="nom_client" value="{{ old('nom_client', $reservation->nom_client) }}" required>
                @error('nom_client')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="email_client">Email du client</label>
                <input type="email" id="email_client" name="email_client" value="{{ old('email_client', $reservation->email_client) }}" required>
                @error('email_client')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="date_reservation">Date</label>
                <input type="date" id="date_reservation" name="date_reservation" value="{{ old('date_reservation', $reservation->date_reservation->format('Y-m-d')) }}" required>
                @error('date_reservation')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="statut">Statut</label>
                <select id="statut" name="statut" required>
                    <option value="en_attente" @selected(old('statut', $reservation->statut) == 'en_attente')>En attente</option>
                    <option value="confirmee" @selected(old('statut', $reservation->statut) == 'confirmee')>Confirmée</option>
                    <option value="annulee" @selected(old('statut', $reservation->statut) == 'annulee')>Annulée</option>
                </select>
                @error('statut')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="service_id">Service</label>
                <select id="service_id" name="service_id" required>
                    <option value="">Sélectionnez un service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" @selected(old('service_id', $reservation->service_id) == $service->id)>{{ $service->titre }} — {{ $service->prestataire->nom ?? 'Prestataire inconnu' }}</option>
                    @endforeach
                </select>
                @error('service_id')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div style="display:flex; gap: 14px; flex-wrap: wrap; align-items:center; margin-top: 10px;">
                <button type="submit" class="button">Mettre à jour</button>
                <a href="{{ route('reservations.index') }}" class="button" style="background: rgba(0,0,0,.55); border-color: rgba(0,255,245,.45);">Retour</a>
            </div>
        </form>
    </div>
@endsection
