<?php

class Profesor extends Miembro{
    private $titular;
    private $asignatura;
    public function __construct($id, $nombre, $apellidos, $email, $titular, $asignatura){
        parent::__construct($id, $nombre, $apellidos, $email);
        $this->titular = $titular;
        $this->asignatura = $asignatura;
    }

    public function crearProfesoresDeMuestra(){
        
    }
}