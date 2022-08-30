<?php

class Almacen {

    private $piezaId;
    private $cantidad;
    private $descripcion;
    private $descuento;
    private $precio;
    private $nombre;

    public function __construct($piezaId, $cantidad, $descripcion, $descuento, $precio, $nombre) {
        $this->piezaId = $piezaId;
        $this->cantidad = $cantidad;
        $this->descripcion = $descripcion;
        $this->descuento = $descuento;
        $this->precio = $precio;
        $this->nombre = $nombre;
    }

    public function getPiezaId() {
        return $this->piezaId;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setCantidad($cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function setPiezaId($piezaId): void {
        $this->piezaId = $piezaId;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setDescuento($descuento): void {
        $this->descuento = $descuento;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

}
