@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="details-grid" style="grid-template-columns: 1fr auto; align-items: center;">
            <div>
                <div class="section-title">Réservations</div>
                <p>Suivez les demandes des clients dans un univers cyberpunk raffiné.</p>
            </div>
            <a href="{{ route('reservations.create') }}" class="button">Nouvelle réservation</a>
        </div>

        @if($reservations->isEmpty())
            <p style="margin-top: 24px; color: rgba(255,255,255,.7);">Aucune réservation pour l'instant.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->nom_client }}</td>
                            <td>{{ optional($reservation->service)->titre ?? '—' }}</td>
                            <td>{{ $reservation->date_reservation }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $reservation->statut)) }}</td>
                            <td>
                                <a href="{{ route('reservations.show', $reservation) }}" class="button" style="padding: 10px 14px; font-size: .85rem;">Voir</a>
                                <a href="{{ route('reservations.edit', $reservation) }}" class="button" style="padding: 10px 14px; font-size: .85rem;">Modifier</a>
                                <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" style="display:inline-block; margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button" style="padding: 10px 14px; font-size: .85rem; background: transparent; border-color: rgba(255,47,165,.8); color: #ff8ec8; box-shadow: 0 0 16px rgba(255,47,165,.15);">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
