@extends('layouts.app')

@section('content')
    <div class="hero">
        <div>
            <div class="section-title">Find Local Services. Instantly.</div>
            <p>GridWork is the neon marketplace for skilled prestataires offering plumbing, gardening, delivery and more. Discover fast local service with a sharp cyberpunk interface.</p>
            <a href="{{ route('services.index') }}" class="button">Explorer les services</a>
        </div>

        <div class="details-item">
            <strong>Marketplace features</strong>
            <ul style="margin-top: 16px; list-style: none; padding-left: 0; color: #c8ffff;">
                <li style="margin-bottom: 10px;">• Services locaux triés par catégorie</li>
                <li style="margin-bottom: 10px;">• Gestion complète des prestataires</li>
                <li style="margin-bottom: 10px;">• Réservations rapides et statut en temps réel</li>
                <li style="margin-bottom: 10px;">• Design noir, accents cyan et lueur néon</li>
            </ul>
        </div>
    </div>
@endsection
