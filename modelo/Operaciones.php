<?php

class Operaciones {

    private $idoperaciones;
    private $piezaId;
    private $horas;
    private $pago;
    private $matricula;
    private $presupuesto;

    public function __construct($idoperaciones, $piezaId, $horas, $pago, $matricula, $presupuesto) {
        $this->idoperaciones = $idoperaciones;
        $this->piezaId = $piezaId;
        $this->horas = $horas;
        $this->pago = $pago;
        $this->matricula = $matricula;
        $this->presupuesto = $presupuesto;
    }

    public function getIdOperaciones() {
        return $this->idoperaciones;
    }

    public function getPiezaId() {
        return $this->piezaId;
    }

    public function getHoras() {
        return $this->horas;
    }

    public function getPago() {
        return $this->pago;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getPresupuesto() {
        return $this->presupuesto;
    }

    public function setIdOperaciones($idoperaciones): void {
        $this->idoperaciones = $idoperaciones;
    }

    public function setPiezaId($piezaId): void {
        $this->piezaId = $piezaId;
    }

    public function setHoras($horas): void {
        $this->horas = $horas;
    }

    public function setPago($pago): void {
        $this->pago = $pago;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setPresupuesto($presupuesto): void {
        $this->presupuesto = $presupuesto;
    }

}
