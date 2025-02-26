<?php
// Incluir la clase Basedatos
require_once '../bd.php';

// Clase Empleados 
class Empleados extends Basedatos
{
    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "EMPLEADOS";
        $this->conexion = $this->getConexion();
    }

    // Función para crear un nuevo empleado
    public function newEmpleado($dni, $email, $password, $rol, $nombre, $apellido1, $apellido2, $calle, $numero, $cp, $poblacion, $provincia, $tlfno, $profesion)
    {
        try {
            // Comprobaciones
            if (empty($dni) || empty($email) || empty($password) || empty($rol) || empty($nombre) || empty($apellido1) || empty($apellido2) || empty($calle) || empty($numero) || empty($cp) || empty($poblacion) || empty($provincia) || empty($tlfno) || empty($profesion)) {
                return "Faltan datos";
            }

            $sql = "SELECT DNI FROM " . $this->table . " WHERE DNI = '" . $dni . "'";
            $empleadoExiste = $this->conexion->query($sql)->fetchColumn();

            if ($empleadoExiste) {
                return "El Empleado ya está dado de alta";
            }

            // Cifrar password
            $passwordCifrada = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO " . $this->table . " (DNI, Email, Password, Rol, Nombre, Apellido1, Apellido2, Calle, Numero, CP, Poblacion, Provincia, tlfno, Profesion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $dni);
            $sentencia->bindParam(2, $email);
            $sentencia->bindParam(3, $passwordCifrada);
            $sentencia->bindParam(4, $rol);
            $sentencia->bindParam(5, $nombre);
            $sentencia->bindParam(6, $apellido1);
            $sentencia->bindParam(7, $apellido2);
            $sentencia->bindParam(8, $calle);
            $sentencia->bindParam(9, $numero);
            $sentencia->bindParam(10, $cp);
            $sentencia->bindParam(11, $poblacion);
            $sentencia->bindParam(12, $provincia);
            $sentencia->bindParam(13, $tlfno);
            $sentencia->bindParam(14, $profesion);
            $sentencia->execute();
            return "Empleado DNI: " . $dni . " insertado correctamente";
        } catch (PDOException $e) {
            return "ERROR AL ingresar.<br>" . $e->getMessage();
        }
    }

    // Función para borrar un empleado
    public function deleteEmpleado($dni)
    {
        try {
            $sql = "SELECT DNI FROM " . $this->table . " WHERE DNI = '" . $dni . "'";
            $empleadoExiste = $this->conexion->query($sql)->fetchColumn();

            if ($empleadoExiste) {
                $sql = "DELETE FROM " . $this->table . " WHERE DNI = ?";
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->bindParam(1, $dni);
                $sentencia->execute();
                return "Empleado DNI: " . $dni . " borrado correctamente";
            } else {
                return "El empleado no existe";
            }
        } catch (PDOException $e) {
            return "Error al borrar el empleado" . $e->getMessage();
        }
    }

    // Función para obtener todos los empleados
    public function getEmpleados()
    {
        try {
            $sql = "SELECT * FROM " . $this->table;
            $resultado = $this->conexion->query($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener los empleados: " . $e->getMessage();
        }
    }

    public function getPassMail($email){
        try {
            $sql = "SELECT Email, Password, Rol FROM " . $this->table . " WHERE Email = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $email);
            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener el email y la contraseña: " . $e->getMessage();
        }
    }

    

    // Función para obtener un empleado por DNI
    public function getEmpleadoByDNI($dni)
    {
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE DNI = ?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $dni);
            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener el empleado: " . $e->getMessage();
        }
    }    
}
?>