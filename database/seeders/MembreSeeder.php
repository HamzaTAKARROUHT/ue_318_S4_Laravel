<?php

namespace Database\Seeders;

use App\Models\Membre;
use Illuminate\Database\Seeder;

class MembreSeeder extends Seeder
{
    public function run(): void
    {
        Membre::create([
            'nom' => 'TAKARROUHT',
            'prenom' => 'Hamza',
            'email' => 'hamza@gmail.com',
        ]);

        Membre::create([
            'nom' => 'OUDHEM',
            'prenom' => 'Wiam',
            'email' => 'wiam@gmail.com',
        ]);

        Membre::create([
            'nom' => 'test',
            'prenom' => 'test',
            'email' => 'test@gmail.com',
        ]);
    }
}
