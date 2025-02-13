<?php

class Servicios extends Basedatos {

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "SERVICIOS";
        $this->conexion = $this->getConexion();
    }

    public function newServicio($cod, $nombre, $precio, $descripcion){
        try {
            $sql = "INSERT INTO " . $this->table . " (cod, nombre, precio, descripcion) VALUES (?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $cod);
            $sentencia->bindParam(2, $nombre);
            $sentencia->bindParam(3, $precio);
            $sentencia->bindParam(4, $descripcion);
            $sentencia->execute();
        } catch (PDOException $e) {
            return "ERROR AL ingresar.<br>" . $e->getMessage();
        }
    }

    public function updateServicio($cod, $precio){
        try {
            $sql = "UPDATE " . $this->table . " SET precio = ? WHERE cod = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $precio);
            $sentencia->bindParam(2, $cod);
            $sentencia->execute();
        } catch (PDOException $e) {
            return "ERROR AL Actualizar.<br>" . $e->getMessage();
        }
    }

    public function numCod($belleza){
        try{
            $sql;
            if($belleza){
                $sql = "SELECT MAX(substr(codigo,5))+1 as 'SIGUIENTE' FROM SERVICIOS WHERE CODIGO LIKE 'SVBE%' ";
            }else{
                $sql = "SELECT MAX(substr(codigo,5))+1 as 'SIGUIENTE' FROM SERVICIOS WHERE CODIGO LIKE 'SVNUT%'";
            }
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $row = $sentencia->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return $row['SIGUIENTE'];
            }
            return "SIN DATOS";
        } catch (PDOException $e) {
            return "ERROR AL Obtener el numero del codigo.<br>" . $e->getMessage();
        }
    }

}


?>