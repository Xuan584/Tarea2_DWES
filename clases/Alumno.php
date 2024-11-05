<?php
class Alumno extends Miembro {
    private $asignaturas = [];
    private $cursoAbonado;
    private $edad;

    public function __construct($id, $nombre, $apellidos, $email, $edad, $cursoAbonado = false) {
        parent::__construct($id, $nombre, $apellidos, $email);
        $this->edad = $edad;
        $this->cursoAbonado = $cursoAbonado;
    }

    public function getAsignaturas() {
        return $this->asignaturas;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function abonarCurso() {
        $this->cursoAbonado = true;
    }

    public function matricularEnAsignatura($asignatura) {
        // Verificar si el alumno ya está matriculado en la asignatura
        foreach ($this->asignaturas as $asig) {
            if ($asig->getId() === $asignatura->getId()) {
                // echo "El alumno ya está matriculado en la asignatura " . $asignatura->getNombre() . "<br>";
                return; 
            }
        }
        // Matricular al alumno en la asignatura
        $this->asignaturas[] = $asignatura;
        // echo "El alumno ha sido matriculado en la asignatura " . $asignatura->getNombre() . "<br>";
    }

    public function bajaEnAsignatura($asignatura) {
        // Buscar el índice de la asignatura en el array por ID
        foreach ($this->asignaturas as $index => $asig) {
            if ($asig->getId() === $asignatura->getId()) {
                // Eliminar la asignatura si se encuentra
                unset($this->asignaturas[$index]);
                $this->asignaturas = array_values($this->asignaturas); // Reindexar el array
                echo "El alumno ha sido dado de baja de la asignatura " . $asignatura->getNombre() . ".<br>";
                return;
            }
        }
        echo "El alumno no está matriculado en la asignatura " . $asignatura->getNombre() . ".<br>";
    }

    // Alumnos de muestra
    public static function crearAlumnosDeMuestra() {
        return [
            new Alumno(1, "Laura", "Martínez", "laura.martinez@email.com", 22),
            new Alumno(2, "Sergio", "López", "sergio.lopez@email.com", 25),
            new Alumno(3, "Carlos", "García", "carlos.garcia@email.com", 24),
            new Alumno(4, "Marta", "Sánchez", "marta.sanchez@email.com", 23),
            new Alumno(5, "Alba", "Fernández", "alba.fernandez@email.com", 21),
            new Alumno(6, "David", "Rodríguez", "david.rodriguez@email.com", 26),
            new Alumno(7, "Lucía", "Jiménez", "lucia.jimenez@email.com", 20),
            new Alumno(8, "Jorge", "Pérez", "jorge.perez@email.com", 22),
            new Alumno(9, "Elena", "Romero", "elena.romero@email.com", 23),
            new Alumno(10, "Pablo", "Torres", "pablo.torres@email.com", 24)
        ];
    }
}
