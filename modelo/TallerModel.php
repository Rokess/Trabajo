<?php

class TallerModel extends Conexion {

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "taller";
        $this->conexion = $this->getConexion();
    }

    function comprobarusuclave($nombre, $clave) {
        $consulta = "select * from taller where taller= ?";
        $conn = $this->getConexion();
        if ($conn == null) {
            return "<h2>ERROR. CONEXIÓN NO ESTABLECIDA.</h2>";
        }
        try {
            $sentencia = $conn->prepare($consulta);
            $sentencia->bindParam(1, $nombre);
            $sentencia->execute();
            if ($sentencia->rowCount() == 1) { //existe usu
                $row = $sentencia->fetch();
                if ($clave == $row['pass']) {
                    return new Taller($row['taller'],$row['pass'], $row['activo'],$row['email'] );
                } else {
                    return "Usuario existe. Clave incorrecta.";
                }
            } else {
                return "Usuario " . $nombre . " no existe, regístrate primero";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}
