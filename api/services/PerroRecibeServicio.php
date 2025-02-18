<?php

class Perros extends Basedatos
{
    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "PERROS";
        $this->conexion = $this->getConexion();
    }

    // Todos los servicios realizados

    public function getPerroRecibeServicio()
    {
        try {
            $sql = "SELECT * FROM PERRO_RECIBE_SERVICIO";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $perro_recibe_servicio = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $perro_recibe_servicio;
        } catch (PDOException $e) {
            return "ERROR AL obtener.<br>" . $e->getMessage();
        }
    }

    // Todos los servicios realizados por un empleado

    public function getServiciosPorEmpleado($dni)
    {
        try {
            $sql = "SELECT * FROM PERRO_RECIBE_SERVICIO WHERE Dni = '" . $dni . "'";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $perro_recibe_servicio = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $perro_recibe_servicio;
        } catch (PDOException $e) {
            return "ERROR AL obtener.<br>" . $e->getMessage();
        }
    }
}
