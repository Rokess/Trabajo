<?php

class AlmacenModel extends Conexion {

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "almacen";
        $this->conexion = $this->getConexion();
    }

    public function getAll($taller) {
        $consulta = "SELECT * from almacen join proveedores on almacen.nombre = proveedores.nombre where proveedores.taller =  ? ";
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

    function getAlmacenProveedor($proveedor) {
        $consulta = "select * from almacen where nombre = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $proveedor);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function getAlmacenDescripcion($descripcion) {
        $consulta = "select * from almacen where descripcion = ? ";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $descripcion);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertarAlmacen($id, $cantidad, $descripcion, $descuento,
            $precio, $nombre) {

        $consulta = "insert into almacen (piezaId, cantidad, descripcion, descuento, precio, nombre) "
                . " values(?, ?, ?, ?, ?, ?)";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $id);
            $sentencia->bindParam(2, $cantidad);
            $sentencia->bindParam(3, $descripcion);
            $sentencia->bindParam(4, $descuento);
            $sentencia->bindParam(5, $precio);
            $sentencia->bindParam(6, $nombre);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
