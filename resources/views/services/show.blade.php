@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="section-title">Détails du service</div>
        <p style="color: rgba(255,255,255,.72); margin-bottom: 24px;">Un aperçu clair du service et de son prestataire.</p>

        <div class="details-grid" style="grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">
            <div class="details-item">
                <strong>Titre</strong>
                <p>{{ $service->titre }}</p>
            </div>
            <div class="details-item">
                <strong>Catégorie</strong>
                <p>{{ $service->categorie }}</p>
            </div>
            <div class="details-item">
                <strong>Prix</strong>
                <p>{{ number_format($service->prix, 2, ',', ' ') }} €</p>
            </div>
            <div class="details-item">
                <strong>Prestataire</strong>
                <p>{{ optional($service->prestataire)->nom ?? '—' }}</p>
            </div>
            <div class="details-item" style="grid-column: span 2;">
                <strong>Description</strong>
                <p>{{ $service->description }}</p>
            </div>
            <div class="details-item" style="grid-column: span 2;">
                <strong>Réservations</strong>
                <p>{{ $service->reservations->count() }} réservations liées</p>
            </div>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 14px; flex-wrap: wrap;">
            <a href="{{ route('services.edit', $service) }}" class="button">Modifier</a>
            <a href="{{ route('services.index') }}" class="button" style="background: rgba(0,0,0,.55); border-color: rgba(0,255,245,.45);">Retour</a>
        </div>
    </div>
@endsection
