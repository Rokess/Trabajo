<?php

class OperacionesModel extends Conexion
{
    //put your code here
    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = 'operaciones';
        $this->conexion = $this->getConexion();
    }

    function getOperacionesMatricula($matricula)
    {
        $consulta = 'select * from operaciones where matricula = ? ';
        $conn = $this->getConexion();
        if ($conn == null) {
            return '<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>';
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

    function getIdOperaciones($idoperaciones)
    {
        $consulta = 'select * from operaciones where idoperaciones = ? ';
        $conn = $this->getConexion();
        if ($conn == null) {
            return '<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>';
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $idoperaciones);
            $sentencia->execute();
            $registros = $sentencia->fetchAll();
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $sql = 'SELECT * from operaciones';
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll();
            $statement = null;
            return $registros;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertarOperacion(
        $horas,
        $pago,
        $matricula,
        $presupuesto,
        $pieza,
        $id
    ) {
        $consulta =
            'insert into operaciones (idoperaciones, piezaId, horas, pago, matricula, presupuesto)' .
            ' values(?, ?, ?, ?, ?, ?)';
        $conn = $this->getConexion();
        if ($conn == null) {
            return '<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>';
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $id);
            $sentencia->bindParam(2, $pieza);
            $sentencia->bindParam(3, $horas);
            $sentencia->bindParam(4, $pago);
            $sentencia->bindParam(5, $matricula);
            $sentencia->bindParam(6, $presupuesto);
            $num = $sentencia->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function modificarOperacion($horas,$pago,$matricula,$presupuesto,$piezaId, $idoperaciones) {
        $consulta ='UPDATE operaciones SET piezaId = ?, horas = ?, pago = ?, matricula = ?, presupuesto = ? WHERE idoperaciones = ? ';
        $conn = $this->getConexion();
        if ($conn == null) {
            return '<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>';
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $piezaId);
            $sentencia->bindParam(2, $horas);
            $sentencia->bindParam(3, $pago);
            $sentencia->bindParam(4, $matricula);
            $sentencia->bindParam(5, $presupuesto);
            $sentencia->bindParam(6, $idoperaciones);
            $num = $sentencia->execute();
            return 'Actualizado con exito!';
        } catch (PDOException $e) {
            return "!HA OCURRIDO UN ERROR!";
        }
    }

    function borrarOperacion($idoperaciones)
    {
        $consulta = 'delete from operaciones where idoperaciones = ?';
        $conn = $this->getConexion();
        if ($conn == null) {
            return '<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>';
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $idoperaciones);
            $num = $sentencia->execute();
            return 'Operacion con id ' . $idoperaciones . ', borrada.';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
