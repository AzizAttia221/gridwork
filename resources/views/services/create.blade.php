@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="section-title">Créer un service</div>
        <p style="color: rgba(255,255,255,.72); margin-bottom: 24px;">Ajoutez un service local avec une allure futuriste.</p>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="titre">Titre</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required>
                @error('titre')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                @error('description')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="categorie">Catégorie</label>
                <input type="text" id="categorie" name="categorie" value="{{ old('categorie') }}" required>
                @error('categorie')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="prix">Prix</label>
                <input type="number" step="0.01" id="prix" name="prix" value="{{ old('prix') }}" required>
                @error('prix')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="field">
                <label for="prestataire_id">Prestataire</label>
                <select id="prestataire_id" name="prestataire_id" required>
                    <option value="">Sélectionnez un prestataire</option>
                    @foreach($prestataires as $prestataire)
                        <option value="{{ $prestataire->id }}" @selected(old('prestataire_id') == $prestataire->id)>{{ $prestataire->nom }} — {{ $prestataire->ville }}</option>
                    @endforeach
                </select>
                @error('prestataire_id')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div style="display:flex; gap: 14px; flex-wrap: wrap; align-items:center; margin-top: 10px;">
                <button type="submit" class="button">Enregistrer</button>
                <a href="{{ route('services.index') }}" class="button" style="background: rgba(0,0,0,.55); border-color: rgba(0,255,245,.45);">Retour</a>
            </div>
        </form>
    </div>
@endsection
