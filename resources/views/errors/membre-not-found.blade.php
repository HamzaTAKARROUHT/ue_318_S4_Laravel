@extends('layouts.app')

@section('title', 'Membre non trouvé')

@section('content')
    <div class="alert alert-danger">
        <h4 class="alert-heading">Erreur!</h4>
        <p>Le membre que vous recherchez n'existe pas.</p>
    </div>
    <a href="{{ route('membres.index') }}" class="btn btn-primary">Retour à la liste des membres</a>
@endsection
