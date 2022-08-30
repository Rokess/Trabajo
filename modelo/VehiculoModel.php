<?php

class VehiculoModel extends Conexion {

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "vehiculo";
        $this->conexion = $this->getConexion();
    }

    function getVehiculoBastidor($bastidor) {
        $consulta = "select * from vehiculo where bastidor = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $bastidor);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getVehiculoMatricula($matricula) {
        $consulta = "select * from vehiculo where matricula = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $matricula);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getVehichuloDni($dni) {
        $consulta = "select * from vehiculo where DNI = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $dni);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertarVehiculo($matricula, $bastidor, $fecha, $nombre, $dni, $telefono, $taller) {

        $consulta = "insert into vehiculo (matricula, bastidor, fecha, nombre, dni, telefono, taller) "
                . " values(?, ?, ?, ?, ?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $matricula);
            $sentencia->bindParam(2, $bastidor);
            $sentencia->bindParam(3, $fecha);
            $sentencia->bindParam(4, $nombre);
            $sentencia->bindParam(5, $dni);
            $sentencia->bindParam(6, $telefono);
            $sentencia->bindParam(7, $taller);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function borrarVehiculo($matricula) {
        $consulta = "delete from vehiculo where matricula = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $matricula);
            $num = $sentencia->execute();
            return "vehiculo con matricula " . $matricula . ", borrado.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
