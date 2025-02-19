<?php
include_once '../bd.php';

class Clientes extends Basedatos
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "CLIENTES";
        $this->conexion = $this->getConexion();
    }

    public function newCliente($dni, $nombre, $apellido1, $apellido2, $direccion, $telefono)
    {
        try {
            // Verificar que no falten datos
            if (empty($dni) || empty($nombre) || empty($apellido1) || empty($apellido2) || empty($direccion) || empty($telefono)) {
                return "Faltan datos";
            }

            // Verificar si el cliente ya está dado de alta
            $sql_check = "SELECT Dni FROM " . $this->table . " WHERE Dni = ?";
            $sentencia_check = $this->conexion->prepare($sql_check);
            $sentencia_check->bindParam(1, $dni);
            $sentencia_check->execute();

            if ($sentencia_check->rowCount() > 0) {
                return "El Cliente ya está dado de alta";
            }

            // Insertar nuevo cliente
            $sql = "INSERT INTO " . $this->table . " (Dni, Nombre, Apellido1, Apellido2, Direccion, Telefono) VALUES (?, ?, ?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $dni);
            $sentencia->bindParam(2, $nombre);
            $sentencia->bindParam(3, $apellido1);
            $sentencia->bindParam(4, $apellido2);
            $sentencia->bindParam(5, $direccion);
            $sentencia->bindParam(6, $telefono);
            $sentencia->execute();

            return "Cliente DNI: $dni insertado correctamente";
        } catch (PDOException $e) {
            return "Error al insertar el cliente: " . $e->getMessage();
        }
    }

    public function deleteCliente($dni)
    {
        try {
            // Verificar si el cliente existe
            $sql_check = "SELECT Dni FROM " . $this->table . " WHERE Dni = ?";
            $sentencia_check = $this->conexion->prepare($sql_check);
            $sentencia_check->bindParam(1, $dni);
            $sentencia_check->execute();

            if ($sentencia_check->rowCount() == 0) {
                return "El cliente no existe";
            }

            // Primero borrar los perros del cliente
            /* $sql_delete_perros = "DELETE FROM PERROS WHERE Dni_Cliente = ?";
        $sentencia_delete_perros = $this->conexion->prepare($sql_delete_perros);
        $sentencia_delete_perros->bindParam(1, $dni);
        $sentencia_delete_perros->execute();*/

            // Luego borrar el cliente
            $sql_delete_cliente = "DELETE FROM " . $this->table . " WHERE Dni = ?";
            $sentencia_delete_cliente = $this->conexion->prepare($sql_delete_cliente);
            $sentencia_delete_cliente->bindParam(1, $dni);
            $sentencia_delete_cliente->execute();

            return "Cliente DNI: $dni borrado correctamente";
        } catch (PDOException $e) {
            return "Error al borrar el cliente: " . $e->getMessage();
        }
    }


    public function getClientes()
    {
        try {
            $sql = "SELECT * FROM CLIENTES";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch (PDOException $e) {
            return "ERROR AL obtener.<br>" . $e->getMessage();
        }
    }

    public function getCliente($dni)
    {
        try {
            $sql = "SELECT * FROM CLIENTES WHERE Dni = '" . $dni . "'";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $cliente = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $cliente;
        } catch (PDOException $e) {
            return "ERROR AL obtener.<br>" . $e->getMessage();
        }
    }
    public function getPerrosCliente($dni)
    {
        try {
            // Verificar si el cliente existe
            $sql_check = "SELECT Dni FROM " . $this->table . " WHERE Dni = ?";
            $sentencia_check = $this->conexion->prepare($sql_check);
            $sentencia_check->bindParam(1, $dni);
            $sentencia_check->execute();

            if ($sentencia_check->rowCount() == 0) {
                return "El cliente no existe";
            }

            // Obtener los perros del cliente
            $sql_perros = "SELECT * FROM PERROS WHERE Dni_Cliente = ?";
            $sentencia_perros = $this->conexion->prepare($sql_perros);
            $sentencia_perros->bindParam(1, $dni);
            $sentencia_perros->execute();
            $perros = $sentencia_perros->fetchAll(PDO::FETCH_ASSOC);

            return $perros;
        } catch (PDOException $e) {
            return "Error al obtener los perros: " . $e->getMessage();
        }
    }
}
