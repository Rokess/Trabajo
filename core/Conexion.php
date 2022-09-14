<?php

abstract class Conexion {

    private $servername = "localhost";
    private $database = "id19569899_tfg";
    private $username = "id19569899_jorge";
    private $password = "@7R}QpVsTg6DuxFp";
    private $registros = array();
    private $conexion;
    private $mensajeerror = "";

    # Conectar a la base de datos

    public function getConexion() {

        try {
            $this->conexion = new PDO("mysql:host=$this->servername;dbname=$this->database;charset=utf8",
                    $this->username, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            $this->mensajeerror = $e->getMessage();
        }
    }

# Desconectar la base de datos

    public function closeConexion() {
        $this->conexion = null;
    }

# Devolver mensaje de error, por si hay error.

    public function getMensajeError() {
        return $this->mensajeerror;
    }

# Traer resultados de una consulta sin parámetros en un Array

    public function getAllreg($tabla) {
        try {
            $sql = "select * from $tabla";
            $statement = $this->conexion->query($sql);
            $this->registros = $statement->fetchAll();
            $statement = null;
            return $this->registros;
        } catch (PDOException $e) {
            $this->mensajeerror = $e->getMessage();
        }
    }

}
?>

