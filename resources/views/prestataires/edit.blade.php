@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="section-title">Modifier le prestataire</div>
        <p style="color: rgba(255,255,255,.72); margin-bottom: 24px;">Mettez à jour les informations du professionnel.</p>

        <form action="{{ route('prestataires.update', $prestataire) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $prestataire->nom) }}" required>
                @error('nom')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $prestataire->email) }}" required>
                @error('email')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone" value="{{ old('telephone', $prestataire->telephone) }}" required>
                @error('telephone')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" value="{{ old('ville', $prestataire->ville) }}" required>
                @error('ville')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div style="display:flex; gap: 14px; flex-wrap: wrap; align-items:center; margin-top: 10px;">
                <button type="submit" class="button">Mettre à jour</button>
                <a href="{{ route('prestataires.index') }}" class="button" style="background: rgba(0,0,0,.55); border-color: rgba(0,255,245,.45);">Retour</a>
            </div>
        </form>
    </div>
@endsection
