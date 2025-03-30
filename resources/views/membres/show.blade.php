@extends('layouts.app')

@section('title', 'Détails du membre')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{ $membre->prenom }} {{ $membre->nom }}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $membre->id }}</p>
            <p><strong>Nom:</strong> {{ $membre->nom }}</p>
            <p><strong>Prénom:</strong> {{ $membre->prenom }}</p>
            
            @if(auth()->check())
                <p><strong>Email:</strong> {{ $membre->email }}</p>
            @else
                <p><strong>Email:</strong> <em>(Connectez-vous pour voir l'email)</em></p>
            @endif
            
            @if($membre->biographie)
                <div class="mt-4">
                    <h4>Biographie</h4>
                    <p>{{ $membre->biographie->description }}</p>
                </div>
            @endif
            
            <div class="mt-3">
                <a href="{{ route('membres.index') }}" class="btn btn-secondary">Retour</a>
                
                @if(auth()->check() && auth()->user()->email === $membre->email)
                    <a href="{{ route('membres.edit', $membre->id) }}" class="btn btn-primary">Modifier</a>
                @endif
            </div>
        </div>
    </div>
@endsection
