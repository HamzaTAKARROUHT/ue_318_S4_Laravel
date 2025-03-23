<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des membres - Version CSS</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            color: #3490dc;
            margin-bottom: 30px;
            text-align: center;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }
        .membre-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .membre-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .membre-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .membre-nom {
            font-size: 18px;
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 5px;
        }
        .membre-email {
            color: #718096;
            font-style: italic;
            margin-bottom: 15px;
        }
        .membre-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .btn-primary {
            background-color: #3490dc;
            color: white;
        }
        .btn-info {
            background-color: #6cb2eb;
            color: white;
        }
        .btn-danger {
            background-color: #e3342f;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des membres du club</h1>
        
        <div class="header-actions">
            <a href="{{ route('membres.create') }}" class="btn btn-primary">Ajouter un membre</a>
            <a href="{{ route('membres.index') }}" class="btn btn-info">Vue standard</a>
        </div>

        <div class="membre-grid">
            @foreach ($membres as $membre)
                <div class="membre-card">
                    <div class="membre-nom">{{ $membre->prenom }} {{ $membre->nom }}</div>
                    <div class="membre-email">{{ $membre->email }}</div>
                    <div class="membre-actions">
                        <a href="{{ route('membres.show', $membre->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('membres.edit', $membre->id) }}" class="btn btn-primary">Éditer</a>
                        <form action="{{ route('membres.destroy', $membre->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
