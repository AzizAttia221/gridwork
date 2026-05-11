@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>Available Services</h1>
    <p>Discover and book local services from trusted providers in your area.</p>
</div>

<div class="container">
    <div class="section-title">Browse Services</div>
    <div class="details-grid">
        @forelse($services as $service)
            <div class="card">
                <h3>{{ $service->titre }}</h3>
                <p><strong>Category:</strong> {{ $service->categorie }}</p>
                <p><strong>Price:</strong> ${{ $service->prix }}</p>
                <p><strong>Provider:</strong> {{ $service->prestataire->nom }}</p>
                <p>{{ Str::limit($service->description, 100) }}</p>
                <a href="{{ route('public.services.show', $service) }}" class="button">View Details</a>
            </div>
        @empty
            <p>No services available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection