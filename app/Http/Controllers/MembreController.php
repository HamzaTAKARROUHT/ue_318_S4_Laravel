<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\Biographie;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    /**
     * Affiche la liste des membres.
     */
    public function index()
    {
        $membres = Membre::all();
        if (!auth()->check()) {
        foreach ($membres as $membre) {
            $membre->email = '***@***.***';
        }
    }
    
    return view('membres.index', compact('membres'));
}

    /**
     * Affiche la liste des membres avec CSS.
     */
    public function indexCss()
    {
        $membres = Membre::all();
        return view('membres.indexcss', compact('membres'));
    }

    /**
     * Affiche le formulaire de création d'un membre.
     */
    public function create()
    {
        return view('membres.create');
    }

    /**
     * Stocke un nouveau membre dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:membres'
        ]);

        Membre::create($request->all());

        return redirect()->route('membres.index')
            ->with('success', 'Membre créé avec succès.');
    }

    /**
     * Affiche les détails d'un membre spécifique.
     */
    public function show(Membre $membre)
    {
        return view('membres.show', compact('membre'));
    }

    /**
     * Affiche le formulaire d'édition d'un membre.
     */
    public function edit(Membre $membre)
    {
            if (!auth()->check() || auth()->user()->email !== $membre->email) {
        return redirect()->route('membres.index')
            ->with('error', 'Vous n\'êtes pas autorisé à modifier ce membre.');
    	}
    
    	return view('membres.edit', compact('membre'));
    }

    /**
     * Met à jour les informations d'un membre dans la base de données.
     */
    public function update(Request $request, Membre $membre)
    {
    if (!auth()->check() || auth()->user()->email !== $membre->email) {
        return redirect()->route('membres.index')
            ->with('error', 'Vous n\'êtes pas autorisé à modifier ce membre.');
    		}
    
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email|unique:membres,email,' . $membre->id,
        'description' => 'nullable'
    ]);
    
    $membre->update([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
    ]);
    
    if ($request->has('description')) {
        if ($membre->biographie) {
            $membre->biographie->update(['description' => $request->description]);
        } else {
            Biographie::create([
                'membre_id' => $membre->id,
                'description' => $request->description
            ]);
        }
    }
    
    return redirect()->route('membres.show', $membre->id)
        ->with('success', 'Membre mis à jour avec succès.');
    }

    public function monProfil()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        $membre = Membre::where('email', auth()->user()->email)->first();
        
        if (!$membre) {
            $name_parts = explode(' ', auth()->user()->name, 2);
            $prenom = $name_parts[0];
            $nom = isset($name_parts[1]) ? $name_parts[1] : '';
            
            $membre = Membre::create([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => auth()->user()->email,
            ]);
            
            return redirect()->route('membres.show', $membre->id)
                ->with('success', 'Votre profil de membre a été créé automatiquement.');
        }
        
        return redirect()->route('membres.show', $membre->id);
    }
    
    public function notFound()
    {
     return view('errors.membre-not-found');
    }
    /**
     * Supprime un membre de la base de données.
     */
    public function destroy(Membre $membre)
    {
        $membre->delete();

        return redirect()->route('membres.index')
            ->with('success', 'Membre supprimé avec succès.');
    }
}
