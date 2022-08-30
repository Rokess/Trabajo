<?php


class Taller {
    private $taller;
    private $pass;
    private $activo;
    private $email;
    
    public function __construct($taller, $pass, $activo, $email) {
        $this->taller = $taller;
        $this->pass = $pass;
        $this->activo = $activo;
        $this->email = $email;
    }
    public function getTaller() {
        return $this->taller;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setTaller($taller): void {
        $this->taller = $taller;
    }

    public function setPass($pass): void {
        $this->pass = $pass;
    }

    public function setActivo($activo): void {
        $this->activo = $activo;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }
        
}
