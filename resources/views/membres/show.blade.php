@extends('layouts.app')

@section('title', 'Détails du membre')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $membre->prenom }} {{ $membre->nom }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $membre->id }}</p>
                    <p><strong>Nom:</strong> {{ $membre->nom }}</p>
                    <p><strong>Prénom:</strong> {{ $membre->prenom }}</p>
                    <p><strong>Email:</strong> {{ $membre->email }}</p>
                    <p><strong>Date de création:</strong> {{ $membre->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Dernière mise à jour:</strong> {{ $membre->updated_at->format('d/m/Y H:i') }}</p>
                    
                    <div class="mt-3">
                        <a href="{{ route('membres.index') }}" class="btn btn-secondary">Retour</a>
                        <a href="{{ route('membres.edit', $membre->id) }}" class="btn btn-primary">Éditer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
