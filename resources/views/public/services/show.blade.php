@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>{{ $service->titre }}</h1>
    <p>Service details and booking information.</p>
</div>

<div class="container">
    <div class="card">
        <h3>Service Information</h3>
        <div class="details-grid">
            <div>
                <strong>Category:</strong> {{ $service->categorie }}
            </div>
            <div>
                <strong>Price:</strong> ${{ $service->prix }}
            </div>
            <div>
                <strong>Provider:</strong> {{ $service->prestataire->nom }}
            </div>
            <div>
                <strong>Contact:</strong> {{ $service->prestataire->email }} | {{ $service->prestataire->telephone }}
            </div>
            <div>
                <strong>Location:</strong> {{ $service->prestataire->ville }}
            </div>
        </div>
        <h4>Description</h4>
        <p>{{ $service->description }}</p>
    </div>

    <div class="card">
        <h3>Book This Service</h3>
        <form action="{{ route('public.services.reserve', $service) }}" method="POST">
            @csrf
            <div class="field">
                <label for="nom_client">Your Name</label>
                <input type="text" id="nom_client" name="nom_client" value="{{ old('nom_client') }}" required>
                @error('nom_client')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="field">
                <label for="email_client">Your Email</label>
                <input type="email" id="email_client" name="email_client" value="{{ old('email_client') }}" required>
                @error('email_client')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="field">
                <label for="date_reservation">Reservation Date</label>
                <input type="date" id="date_reservation" name="date_reservation" value="{{ old('date_reservation') }}" required>
                @error('date_reservation')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="button">Submit Reservation</button>
        </form>
    </div>

    <a href="{{ route('public.services.index') }}" class="button">Back to Services</a>
</div>
@endsection