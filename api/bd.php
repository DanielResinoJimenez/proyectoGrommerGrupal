<?php

abstract class Basedatos
{

    private $servername = "localhost:3306";
    private $database = "gromer";
    private $username = "root";
    private $password = "";
    private $conexion;
    private $mensajeError = "";

    # Conectar a la base de datos

    public function getConexion()
    {

        try {
            $this->conexion = new PDO(
                "mysql:host=$this->servername;dbname=$this->database;charset=utf8",
                $this->username,
                $this->password
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            $this->mensajeError = $e->getMessage();
        }
    }

    # Desconectar la base de datos

    public function closeConexion()
    {
        $this->conexion = null;
    }

    # Devolver mensaje de error, por si hay error.

    public function getMensajeError()
    {
        return $this->mensajeError;
    }
}
