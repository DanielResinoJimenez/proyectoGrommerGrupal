<?php

require_once('./../bd.php');
require_once('./../services/Empleados.php');

$empleados = new Empleados();
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer el cuerpo de la solicitud que contiene datos en formato JSON
    $data = json_decode(file_get_contents("php://input"), true); // Decodificar el JSON a un array PHP

    // Verificar si están todos los datos requeridos
    if (!empty($data['dni']) && !empty($data['email']) && !empty($data['password']) && 
        !empty($data['rol']) && !empty($data['nombre']) && !empty($data['apellido1']) &&
        !empty($data['calle']) && !empty($data['numero']) && !empty($data['cp']) && 
        !empty($data['poblacion']) && !empty($data['provincia']) && !empty($data['telefono']) && 
        !empty($data['profesion'])) {

        // Si todos los datos están, insertar el nuevo empleado
        $response = $empleados->newEmpleado(
            $data['dni'], $data['email'], $data['password'], $data['rol'], 
            $data['nombre'], $data['apellido1'], $data['apellido2'], $data['calle'], 
            $data['numero'], $data['cp'], $data['poblacion'], $data['provincia'], 
            $data['telefono'], $data['profesion']
        );
        echo json_encode(["message" => $response, "status" => "success"]);
    } else {
        echo json_encode(["error" => "Faltan datos requeridos", "status" => "error"]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['dni'])) {
        $empleado = $empleados->getEmpleadoByDNI($_GET['dni']);
        echo json_encode($empleado);
    } else {
        $empleadosList = $empleados->getEmpleados();
        echo json_encode($empleadosList);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Comprobamos si el método de la solicitud es DELETE
    $data = json_decode(file_get_contents("php://input"), true);

    // Verificar si el campo 'dni' existe
    if (isset($data['dni'])) {
        // Si existe, eliminamos al empleado por su DNI
        $response = $empleados->deleteEmpleado($data['dni']);
        echo json_encode(["message" => $response, "status" => "success"]);
    } else {
        echo json_encode(["error" => "Se requiere el DNI del empleado", "status" => "error"]);
    }
} else {
    // En caso de que ninguna de las opciones anteriores se haya ejecutado
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(["error" => "Método no permitido", "status" => "error"]);
}

?>