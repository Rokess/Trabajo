<?php


class Vehiculo {
    private $matricula;
    private $bastidor;
    private $fecha;
    private $nombre;
    private $dni;
    private $telefono;
    private $taller;
    
    public function __construct($matricula, $bastidor, $fecha, $nombre, $dni, $telefono, $taller) {
        $this->matricula = $matricula;
        $this->bastidor = $bastidor;
        $this->fecha = $fecha;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->taller = $taller;
    }
    public function getMatricula() {
        return $this->matricula;
    }

    public function getBastidor() {
        return $this->bastidor;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getTaller() {
        return $this->taller;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setBastidor($bastidor): void {
        $this->bastidor = $bastidor;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDni($dni): void {
        $this->dni = $dni;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setTaller($taller): void {
        $this->taller = $taller;
    }


        
}
