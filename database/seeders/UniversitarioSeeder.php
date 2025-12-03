<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estudiantes = [
            ['cu' => '20210001', 'nombres' => 'Carlos', 'apellidos' => 'Rodriguez', 'correo' => 'carlos.rodriguez@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20210002', 'nombres' => 'Maria', 'apellidos' => 'Gonzalez', 'correo' => 'maria.gonzalez@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20210003', 'nombres' => 'Juan', 'apellidos' => 'Martinez', 'correo' => 'juan.martinez@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20210004', 'nombres' => 'Ana', 'apellidos' => 'Lopez', 'correo' => 'ana.lopez@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20210005', 'nombres' => 'Pedro', 'apellidos' => 'Sanchez', 'correo' => 'pedro.sanchez@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20220001', 'nombres' => 'Sofia', 'apellidos' => 'Ramirez', 'correo' => 'sofia.ramirez@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20220002', 'nombres' => 'Diego', 'apellidos' => 'Torres', 'correo' => 'diego.torres@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20220003', 'nombres' => 'Valentina', 'apellidos' => 'Flores', 'correo' => 'valentina.flores@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20220004', 'nombres' => 'Lucas', 'apellidos' => 'Morales', 'correo' => 'lucas.morales@ucb.edu.bo', 'whatsapp' => '+59174431122'],
            ['cu' => '20220005', 'nombres' => 'Isabella', 'apellidos' => 'Vargas', 'correo' => 'isabella.vargas@ucb.edu.bo', 'whatsapp' => '+59174431122'],
        ];

        foreach ($estudiantes as $estudiante) {
            \App\Models\Universitario::create([
                'cu' => $estudiante['cu'],
                'nombres' => $estudiante['nombres'],
                'apellidos' => $estudiante['apellidos'],
                'correo' => $estudiante['correo'],
                'contrasena' => bcrypt($estudiante['cu'] . $estudiante['apellidos']),
                'whatsapp' => $estudiante['whatsapp'] ?? null,
            ]);
        }
    }
}
