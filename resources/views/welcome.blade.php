@extends('layouts.app')

@section('content')
    <div class="hero">
        <div>
            <div class="section-title">Find Local Services. Instantly.</div>
            <p>GridWork is the neon marketplace for skilled prestataires offering plumbing, gardening, delivery and more. Discover fast local service with a sharp cyberpunk interface.</p>
            <a href="{{ route('public.services.index') }}" class="button">Explore Services</a>
        </div>

        <div class="details-item">
            <strong>Marketplace features</strong>
            <ul style="margin-top: 16px; list-style: none; padding-left: 0; color: #c8ffff;">
                <li style="margin-bottom: 10px;">• Local services sorted by category</li>
                <li style="margin-bottom: 10px;">• Complete prestataire management</li>
                <li style="margin-bottom: 10px;">• Fast reservations with real-time status</li>
                <li style="margin-bottom: 10px;">• Black design, cyan accents and neon glow</li>
            </ul>
        </div>
    </div>
@endsection
