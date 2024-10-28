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
    
    public function getEdad(){
        return $this->edad;
    }

    public function abonarCurso() {
        $this->cursoAbonado = true;
    }

    public function matricularEnAsignatura($asignatura) {
        // Foreach para recorrer las asignaturas
        foreach ($this->asignaturas as $asig) {
            // En caso de que coincida es que ya está matriculado en la asignatura
            if ($asig->getId() == $asignatura->getId()) {
                echo "El alumno ya está matriculado en la asignatura ". $asignatura->getNombre() .".\n";
                return; 
            }
        }
        $this->asignaturas[] = $asignatura;
        echo "El alumno ha sido matriculado en la asignatura ". $asignatura->getNombre .".\n";
    }

    public function bajaEnAsignatura($asignatura) {
        // Uso array_search para buscar la asignatura por su ID dentro del array
        $index = array_search($asignatura, $this->asignaturas, true);
    
        // Si no encuentra la asignatura, indico que no está matriculado
        if ($index === false) {
            echo "El alumno no está matriculado en la asignatura ". $asignatura->getNombre() .".<br>";
            return;
        }
    
        // Si se encuentra la asignatura, la elimino con unset
        unset($this->asignaturas[$index]);
    
        // Reindexamos el array
        $this->asignaturas = array_values($this->asignaturas);
    
        echo "El alumno ha sido dado de baja de la asignatura ". $asignatura->getNombre() .".<br>";
    }
    

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
