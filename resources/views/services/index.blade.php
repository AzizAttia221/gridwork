@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="details-grid" style="grid-template-columns: 1fr auto; align-items: center;">
            <div>
                <div class="section-title">Services</div>
                <p>Explore and manage service listings, from plumbing to urban delivery.</p>
            </div>
            <a href="{{ route('services.create') }}" class="button">Nouveau service</a>
        </div>

        @if($services->isEmpty())
            <p style="margin-top: 24px; color: rgba(255,255,255,.7);">Aucun service disponible. Commencez par ajouter un service.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Prestataire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->titre }}</td>
                            <td>{{ $service->categorie }}</td>
                            <td>{{ number_format($service->prix, 2, ',', ' ') }} €</td>
                            <td>{{ optional($service->prestataire)->nom ?? '—' }}</td>
                            <td>
                                <a href="{{ route('services.show', $service) }}" class="button" style="padding: 10px 14px; font-size: .85rem;">Voir</a>
                                <a href="{{ route('services.edit', $service) }}" class="button" style="padding: 10px 14px; font-size: .85rem;">Modifier</a>
                                <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline-block; margin:0;">
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
