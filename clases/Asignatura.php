<?php

class Asignatura{
    private $id;
    private $nombre;
    private $creditos;
    public function __construct($id, $nombre, $creditos){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->creditos = $creditos;
    }

    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getCreditos(){
        return $this->creditos;
    }
    public function setId(int $id): void{
        $this->id = $id;
    }
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }
    public function setCreditos(int $creditos): void{
        $this->creditos = $creditos;
    }

    public static function crearAsignaturasDeMuestra() {
        return [
            new Asignatura(1, 'DWES', 7),
            new Asignatura(2, 'DWEC', 6),
            new Asignatura(3, 'DIW', 4),
            new Asignatura(4, 'DAW', 4)
        ];
    }
}