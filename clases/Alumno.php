<?php
class Alumno extends Miembro {
    private $asignaturas = [];
    private $cursoAbonado;
    private $edad;

    public function __construct($id, $nombre, $apellidos, $email, $cursoAbonado = false, $edad) {
        parent::__construct($id, $nombre, $apellidos, $email);
        $this->cursoAbonado = $cursoAbonado;
        $this->edad = $edad;
    }

    public function abonarCurso() {
        $this->cursoAbonado = true;
    }

    public function matricularEnAsignatura($asignatura) {
        foreach ($this->asignaturas as $asig) {
            if ($asig->getId() == $asignatura->getId()) {
                return; 
            }
        }
        $this->asignaturas[] = $asignatura;
    }

    public function bajaEnAsignatura($asignatura) {
        $this->asignaturas = array_filter($this->asignaturas, function($a) use ($asignatura) {
            return $a->getId() !== $asignatura->getId();
        });
    }

    public static function crearAlumnosDeMuestra(): array {
        return [
            
        ];
    }
}
