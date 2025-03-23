@extends('layouts.app')

@section('title', 'Liste des membres')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('membres.create') }}" class="btn btn-primary">Ajouter un membre</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($membres as $membre)
            <tr>
                <td>{{ $membre->id }}</td>
                <td>{{ $membre->nom }}</td>
                <td>{{ $membre->prenom }}</td>
                <td>{{ $membre->email }}</td>
                <td>
                    <form action="{{ route('membres.destroy', $membre->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('membres.show', $membre->id) }}">Voir</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('membres.edit', $membre->id) }}">Éditer</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
