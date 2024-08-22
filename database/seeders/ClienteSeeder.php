<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{

    public function run(): void
    {
        Cliente::create([
            'nombre' => 'Andre',
            'apellidos' => 'Solorzano Toledo',
            'correo' => 'andrehorizon25@gmail.com',
            'telefono' => 9622362374,
            'direccion' => 'Camino la pita, N°12',
            'sexo' => 'Masculino'
        ]);

        Cliente::create([
            'nombre' => 'Ernesto',
            'apellidos' => 'Toledo Perez',
            'correo' => 'ernestoperez@gmail.com',
            'telefono' => 9621111111,
            'direccion' => 'Callejon el tubo, N°33',
            'sexo' => 'Masculino'
        ]);
    }
}
