@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="section-title">Détails du prestataire</div>
        <p style="color: rgba(255,255,255,.72); margin-bottom: 24px;">Voir le profil et les services proposés.</p>

        <div class="details-grid" style="grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">
            <div class="details-item">
                <strong>Nom</strong>
                <p>{{ $prestataire->nom }}</p>
            </div>
            <div class="details-item">
                <strong>Email</strong>
                <p>{{ $prestataire->email }}</p>
            </div>
            <div class="details-item">
                <strong>Téléphone</strong>
                <p>{{ $prestataire->telephone }}</p>
            </div>
            <div class="details-item">
                <strong>Ville</strong>
                <p>{{ $prestataire->ville }}</p>
            </div>
            <div class="details-item" style="grid-column: span 2;">
                <strong>Services</strong>
                <p>{{ $prestataire->services->count() }} service(s) enregistrés</p>
            </div>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 14px; flex-wrap: wrap;">
            <a href="{{ route('prestataires.edit', $prestataire) }}" class="button">Modifier</a>
            <a href="{{ route('prestataires.index') }}" class="button" style="background: rgba(0,0,0,.55); border-color: rgba(0,255,245,.45);">Retour</a>
        </div>
    </div>
@endsection
