@extends('layouts.app')

@section('title', 'Modifier un membre')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Modifier le membre</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('membres.update', $membre->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $membre->nom }}">
                </div>
                
                <div class="mb-3">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $membre->prenom }}">
                </div>
                
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $membre->email }}">
                </div>
                
                <div class="mb-3">
                    <label for="description">Biographie</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $membre->biographie ? $membre->biographie->description : '' }}</textarea>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('membres.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection
