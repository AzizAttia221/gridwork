@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="details-grid" style="grid-template-columns: 1fr auto; align-items: center;">
            <div>
                <div class="section-title">Prestataires</div>
                <p>Gérez les professionnels de la place de marché locale.</p>
            </div>
            <a href="{{ route('prestataires.create') }}" class="button">Nouveau prestataire</a>
        </div>

        @if($prestataires->isEmpty())
            <p style="margin-top: 24px; color: rgba(255,255,255,.7);">Aucun prestataire trouvé pour le moment.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Ville</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prestataires as $prestataire)
                        <tr>
                            <td>{{ $prestataire->nom }}</td>
                            <td>{{ $prestataire->email }}</td>
                            <td>{{ $prestataire->telephone }}</td>
                            <td>{{ $prestataire->ville }}</td>
                            <td>
                                <a href="{{ route('prestataires.show', $prestataire) }}" class="button" style="padding: 10px 14px; font-size: .85rem;">Voir</a>
                                <a href="{{ route('prestataires.edit', $prestataire) }}" class="button" style="padding: 10px 14px; font-size: .85rem;">Modifier</a>
                                <form action="{{ route('prestataires.destroy', $prestataire) }}" method="POST" style="display:inline-block; margin:0;">
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
