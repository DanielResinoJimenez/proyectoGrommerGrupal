<?php

class Perros extends Basedatos
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "SERVICIOS";
        $this->conexion = $this->getConexion();
    }

    public function newPerro($dni_duenio, $nombre, $fecha_nto, $raza, $peso, $altura, $observaciones, $numero_chip, $sexo)
    {
        try {

            $sql = "SELECT Dni FROM CLIENTES WHERE Dni = '" . $dni_duenio . "'";
            $duenioExiste = $this->conexion->exec($sql);

            if ($duenioExiste) {
                $sql = "INSERT INTO " . $this->table . " (Dni_duenio, Nombre, Fecha_Nto, Raza, Peso, Altura, Observaciones, Numero_Chip, Sexo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->bindParam(1, $dni_duenio);
                $sentencia->bindParam(2, $nombre);
                $sentencia->bindParam(3, $fecha_nto);
                $sentencia->bindParam(4, $raza);
                $sentencia->bindParam(5, $peso);
                $sentencia->bindParam(6, $altura);
                $sentencia->bindParam(7, $observaciones);
                $sentencia->bindParam(8, $numero_chip);
                $sentencia->bindParam(9, $sexo);
                $sentencia->execute();
                return "Perro insertado correctamente";
            } else {
                return "Error al insertar el perro. El dueño no está dado de alta";
            }
        } catch (PDOException $e) {
            return "ERROR AL ingresar.<br>" . $e->getMessage();
        }
    }

    public function deletePerro($chip)
    {
        try {

            $sql = "SELECT ID_PERRO FROM PERRROS WHERE Numero_Chip = '" . $chip . "'";
            $idPerroDeleted = $this->conexion->exec($sql);
            if ($idPerroDeleted) {
                $sql = "UPDATE TABLE PERRO_RECIBE_SERVICIO SET ID_Perro = NULL WHERE ID_Perro = " . $idPerroDeleted;
                $this->conexion->exec($sql);
                $sql = "DELETE FROM PERROS WHERE Numero_Chip = " . $chip;
                $this->conexion->exec($sql);
                return "El perro ha sido borrado con éxito";
            } else {
                return "El perro que quieres borrar no existe";
            }
            $sql = "DELETE FROM PERROS WHERE Numero_Chip = '" . $chip . "'";
        } catch (PDOException $e) {
            return "Error al borrar el perro" . $e->getMessage();
        }
    }
}
