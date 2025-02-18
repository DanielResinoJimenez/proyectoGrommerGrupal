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

    public function newPerro($dni_duenio, $nombre, $fecha_nto, $raza, $peso, $altura, $observaciones, $numero_chip, $sexo)
    {
        try {
            // Verificar si el dueño existe
            $sql = "SELECT Dni FROM CLIENTES WHERE Dni = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$dni_duenio]);
            $duenioExiste = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$duenioExiste) {
                return "Error: El dueño no está registrado.";
            }

            // Insertar el perro
            $sql = "INSERT INTO PERROS (Dni_duenio, Nombre, Fecha_Nto, Raza, Peso, Altura, Observaciones, Numero_Chip, Sexo) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$dni_duenio, $nombre, $fecha_nto, $raza, $peso, $altura, $observaciones, $numero_chip, $sexo]);

            return "Perro insertado correctamente";
        } catch (PDOException $e) {
            return "Error al ingresar: " . $e->getMessage();
        }
    }

    public function deletePerro($chip)
    {
        try {
            // Verificar si el perro existe
            $sql = "SELECT ID_PERRO FROM PERROS WHERE Numero_Chip = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$chip]);
            $idPerroDeleted = $stmt->fetchColumn();

            if (!$idPerroDeleted) {
                return "El perro que quieres borrar no existe";
            }

            // Actualizar referencias en otras tablas
            $sql = "UPDATE PERRO_RECIBE_SERVICIO SET ID_Perro = NULL WHERE ID_Perro = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$idPerroDeleted]);

            // Borrar el perro
            $sql = "DELETE FROM PERROS WHERE Numero_Chip = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$chip]);

            return "El perro ha sido borrado con éxito";
        } catch (PDOException $e) {
            return "Error al borrar el perro: " . $e->getMessage();
        }
    }
}
