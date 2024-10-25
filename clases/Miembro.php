<?php

class Miembro{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    public function __construct($id, $nombre, $apellidos, $email){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
    }

    public function getId(): int{
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setId(int $id): void{
        $this->id = $id;
    }
    public function setNombre($nombre): void{
        $this->nombre = $nombre;
    }
    public function setApellidos($apellidos): void{
        $this->apellidos = $apellidos;
    }
    public function setEmail($email): void{
        $this->email = $email;
    }

    public function __toString(): string {
        return "{$this->nombre}, {$this->apellidos}, {$this->email}";
    }
}