<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anuncios = [
            // Ciencias de la Computación
            [
                'carrera' => 'Ciencias de la Computación',
                'anuncio' => 'Examen final de Algoritmos y Estructuras de Datos el viernes 1 de diciembre a las 10:00 AM en el Aula Magna.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-12-01',
                'fecha_finalizacion' => '2025-12-01',
            ],
            [
                'carrera' => 'Ciencias de la Computación',
                'anuncio' => 'Recordatorio: Entrega del proyecto final de Inteligencia Artificial hasta el 30 de noviembre.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-11-25',
                'fecha_finalizacion' => '2025-11-30',
            ],
            [
                'carrera' => 'Ciencias de la Computación',
                'anuncio' => 'Charla sobre Machine Learning con expertos de Google el próximo martes a las 3:00 PM.',
                'categoria' => 'evento',
                'fecha_inicio' => '2025-12-02',
                'fecha_finalizacion' => '2025-12-02',
            ],
            [
                'carrera' => 'Ciencias de la Computación',
                'anuncio' => 'Se suspende la clase de Programación Web del miércoles por actividades académicas.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-03',
                'fecha_finalizacion' => '2025-12-03',
            ],

            // Telecomunicaciones
            [
                'carrera' => 'Telecomunicaciones',
                'anuncio' => 'Examen parcial de Redes de Comunicación el lunes 27 de noviembre. Estudiar capítulos 1-5.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-11-27',
                'fecha_finalizacion' => '2025-11-27',
            ],
            [
                'carrera' => 'Telecomunicaciones',
                'anuncio' => 'Taller práctico de instalación de antenas este sábado en el laboratorio de telecomunicaciones.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-11-29',
                'fecha_finalizacion' => '2025-11-29',
            ],
            [
                'carrera' => 'Telecomunicaciones',
                'anuncio' => 'Conferencia sobre 5G y el futuro de las telecomunicaciones el jueves a las 4:00 PM.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-11-28',
                'fecha_finalizacion' => '2025-11-28',
            ],

            // TIC
            [
                'carrera' => 'TIC',
                'anuncio' => 'URGENTE: Cambio de horario para el examen de Gestión de Proyectos TI. Ahora será el jueves a las 2:00 PM.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-12-04',
                'fecha_finalizacion' => '2025-12-04',
            ],
            [
                'carrera' => 'TIC',
                'anuncio' => 'Inscripciones abiertas para el curso de certificación en ITIL Foundation.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-05',
                'fecha_finalizacion' => '2025-12-05',
            ],
            [
                'carrera' => 'TIC',
                'anuncio' => 'Reunión de coordinación de carrera el viernes a las 11:00 AM en la sala de profesores.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-05',
                'fecha_finalizacion' => '2025-12-05',
            ],
            [
                'carrera' => 'General',
                'anuncio' => 'El próximo fin de semana se llevará a cabo el torneo de fútbol entre carreras.',
                'categoria' => 'deportes',
                'fecha_inicio' => '2025-12-06',
                'fecha_finalizacion' => '2025-12-06',
            ],

            // Sistemas
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Defensa de tesis de grado programadas para la primera semana de diciembre. Revisar cronograma en secretaría.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-01',
                'fecha_finalizacion' => '2025-12-07',
            ],
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Hackathon universitario este fin de semana. Premios para los 3 primeros lugares. ¡Inscríbete ya!',
                'categoria' => 'deportes',
                'fecha_inicio' => '2025-12-06',
                'fecha_finalizacion' => '2025-12-06',
            ],
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Clase de recuperación de Bases de Datos el sábado a las 9:00 AM.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-06',
                'fecha_finalizacion' => '2025-12-06',
            ],
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Visita técnica a empresa de desarrollo de software el próximo mes. Cupos limitados.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-07',
                'fecha_finalizacion' => '2025-12-07',
            ],
        ];

        foreach ($anuncios as $anuncio) {
            \App\Models\Anuncio::create($anuncio);
        }
    }
}
