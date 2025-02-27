<?php

    class PerroRecibeServicio extends Basedatos {

        private $table;
        private $conexion;
    
        public function __construct()
        {
            $this->table = "PERRO_RECIBE_SERVICIO";
            $this->conexion = $this->getConexion();
        }
    
        // TODOS LOS SERVICIOS REALIZADOS
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
        
        // TODOS LOS SERVICIOS REALIZADOS POR UN EMPLEADO
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

        // BORRAR SERVICIO REALIZADO
        public function deleteServiRealizado($id)
        {
            $sql = "DELETE FROM " . $this->table . " WHERE Sr_Cod = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }

        // INSERTAR NUEVO SERVICIO REALIZADO
        public function newServiRealizado($perro_id, $servicio_id, $fecha, $empleado_id, $precioFinal, $incidencias)
        {
            $sql = "INSERT INTO " . $this->table . " (ID_Perro, Cod_Servicio, Fecha, Dni, Precio_Final, Incidencias) VALUES (:perro_id, :servicio_id, :fecha, :empleado_id, :precioFinal, :incidencias)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':perro_id', $perro_id);
            $stmt->bindParam(':servicio_id', $servicio_id);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':empleado_id', $empleado_id);
            $stmt->bindParam(':precioFinal', $precioFinal);
            $stmt->bindParam(':incidencias', $incidencias);
            return $stmt->execute();
        }
}
