<?php

class ProveedoresModel extends Conexion {

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "proveedores";
        $this->conexion = $this->getConexion();
    }

    public function insertarProveedor($cif, $direccion, $telefono,
            $nombre, $taller) {

        $consulta = "insert into proveedores (cif, direccion, telefono, nombre, taller) "
                . " values(?, ?, ?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $cif);
            $sentencia->bindParam(2, $direccion);
            $sentencia->bindParam(3, $telefono);
            $sentencia->bindParam(4, $nombre);
            $sentencia->bindParam(5, $taller);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getProveedorNombre($nombre, $taller) {
        $consulta = "select * from proveedores where nombre = ? AND taller = ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $taller);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAll($taller) {
        $consulta = "select * from proveedores where taller = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $taller);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
