@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="section-title">Détails de la réservation</div>
        <p style="color: rgba(255,255,255,.72); margin-bottom: 24px;">Consultez le statut et les informations du client.</p>

        <div class="details-grid" style="grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">
            <div class="details-item">
                <strong>Client</strong>
                <p>{{ $reservation->nom_client }}</p>
            </div>
            <div class="details-item">
                <strong>Email</strong>
                <p>{{ $reservation->email_client }}</p>
            </div>
            <div class="details-item">
                <strong>Date</strong>
                <p>{{ $reservation->date_reservation }}</p>
            </div>
            <div class="details-item">
                <strong>Statut</strong>
                <p>{{ ucfirst(str_replace('_', ' ', $reservation->statut)) }}</p>
            </div>
            <div class="details-item" style="grid-column: span 2;">
                <strong>Service réservé</strong>
                <p>{{ optional($reservation->service)->titre ?? '—' }}</p>
                <p style="margin-top: 8px; color: rgba(255,255,255,.7);">Prestataire : {{ optional(optional($reservation->service)->prestataire)->nom ?? '—' }}</p>
            </div>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 14px; flex-wrap: wrap;">
            <a href="{{ route('reservations.edit', $reservation) }}" class="button">Modifier</a>
            <a href="{{ route('reservations.index') }}" class="button" style="background: rgba(0,0,0,.55); border-color: rgba(0,255,245,.45);">Retour</a>
        </div>
    </div>
@endsection
