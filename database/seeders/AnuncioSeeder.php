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
                'detalles' => 'Traer documento de identidad y calculadora aprobada por el departamento.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-12-01',
                'fecha_finalizacion' => '2026-12-01',
            ],
            [
                'carrera' => 'Ciencias de la Computación',
                'anuncio' => 'Recordatorio: Entrega del proyecto final de Inteligencia Artificial hasta el 30 de noviembre.',
                'detalles' => 'Subir código y documentación al repositorio indicado; formato PDF para la memoria.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-11-25',
                'fecha_finalizacion' => '2026-11-30',
            ],
            [
                'carrera' => 'Ciencias de la Computación',
                'anuncio' => 'Charla sobre Machine Learning con expertos de Google el próximo martes a las 3:00 PM.',
                'detalles' => 'Inscripción gratuita, cupos limitados. Llevar laptop si desea seguir el taller práctico.',
                'categoria' => 'evento',
                'fecha_inicio' => '2025-12-02',
                'fecha_finalizacion' => '2026-12-02',
            ],
            [
                'carrera' => 'Ciencias de la Computación',
                'anuncio' => 'Se suspende la clase de Programación Web del miércoles por actividades académicas.',
                'detalles' => 'Se reprogramará la clase en la próxima semana; revisar calendario de aula.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-03',
                'fecha_finalizacion' => '2026-12-03',
            ],

            // Telecomunicaciones
            [
                'carrera' => 'Telecomunicaciones',
                'anuncio' => 'Examen parcial de Redes de Comunicación el lunes 27 de noviembre. Estudiar capítulos 1-5.',
                'detalles' => 'La asistencia es obligatoria; revisar materiales en la plataforma Moodle.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-11-27',
                'fecha_finalizacion' => '2026-11-27',
            ],
            [
                'carrera' => 'Telecomunicaciones',
                'anuncio' => 'Taller práctico de instalación de antenas este sábado en el laboratorio de telecomunicaciones.',
                'detalles' => 'Traer ropa cómoda y guantes. Cupo máximo 20 estudiantes.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-11-29',
                'fecha_finalizacion' => '2026-11-29',
            ],
            [
                'carrera' => 'Telecomunicaciones',
                'anuncio' => 'Conferencia sobre 5G y el futuro de las telecomunicaciones el jueves a las 4:00 PM.',
                'detalles' => 'Habrá sesión de preguntas al final y entrega de certificados digitales.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-11-28',
                'fecha_finalizacion' => '2026-11-28',
            ],

            // TIC
            [
                'carrera' => 'TIC',
                'anuncio' => 'URGENTE: Cambio de horario para el examen de Gestión de Proyectos TI. Ahora será el jueves a las 2:00 PM.',
                'detalles' => 'Revisar notificaciones oficiales para posibles cambios adicionales.',
                'categoria' => 'importante',
                'fecha_inicio' => '2025-12-04',
                'fecha_finalizacion' => '2025-12-04',
            ],
            [
                'carrera' => 'TIC',
                'anuncio' => 'Inscripciones abiertas para el curso de certificación en ITIL Foundation.',
                'detalles' => 'Costo subsidiado para estudiantes UCB; revisar requisitos de inscripción.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-05',
                'fecha_finalizacion' => '2025-12-05',
            ],
            [
                'carrera' => 'TIC',
                'anuncio' => 'Reunión de coordinación de carrera el viernes a las 11:00 AM en la sala de profesores.',
                'detalles' => 'Convocatoria para delegados de cada año; confirmar asistencia.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-05',
                'fecha_finalizacion' => '2025-12-05',
            ],
            [
                'carrera' => 'General',
                'anuncio' => 'El próximo fin de semana se llevará a cabo el torneo de fútbol entre carreras.',
                'detalles' => 'Equipos mixtos; inscripciones hasta el jueves por la tarde.',
                'categoria' => 'deportes',
                'fecha_inicio' => '2025-12-06',
                'fecha_finalizacion' => '2025-12-06',
            ],

            // Sistemas
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Defensa de tesis de grado programadas para la primera semana de diciembre. Revisar cronograma en secretaría.',
                'detalles' => 'Consultar horarios individuales con el director de tesis.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-01',
                'fecha_finalizacion' => '2025-12-07',
            ],
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Hackathon universitario este fin de semana. Premios para los 3 primeros lugares. ¡Inscríbete ya!',
                'detalles' => 'Inscripción por equipos de 3-5 personas; revisar base de datos de retos.',
                'categoria' => 'deportes',
                'fecha_inicio' => '2025-12-06',
                'fecha_finalizacion' => '2025-12-06',
            ],
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Clase de recuperación de Bases de Datos el sábado a las 9:00 AM.',
                'detalles' => 'Asistencia opcional; material disponible en la plataforma.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-06',
                'fecha_finalizacion' => '2025-12-06',
            ],
            [
                'carrera' => 'Sistemas',
                'anuncio' => 'Visita técnica a empresa de desarrollo de software el próximo mes. Cupos limitados.',
                'detalles' => 'Transporte y almuerzo incluidos para los primeros inscritos.',
                'categoria' => 'academico',
                'fecha_inicio' => '2025-12-07',
                'fecha_finalizacion' => '2025-12-07',
            ],
        ];

        foreach ($anuncios as $anuncio) {
            \App\Models\Anuncio::create($anuncio + ['detalles' => $anuncio['detalles'] ?? null]);
        }
    }
}
