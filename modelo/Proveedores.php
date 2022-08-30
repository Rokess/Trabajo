<?php


class Proveedores {
    private $cif;
    private $direccion;
    private $telefono;
    private $nombre;
    private $taller;
    
    public function __construct($cif, $direccion, $telefono, $nombre, $taller) {
        $this->cif = $cif;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->nombre = $nombre;
        $this->taller = $taller;
    }

    public function getCif() {
        return $this->cif;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTaller() {
        return $this->taller;
    }

    public function setCif($cif): void {
        $this->cif = $cif;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setTaller($taller): void {
        $this->taller = $taller;
    }



    
    
}
