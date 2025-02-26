<?php

require_once('../bd.php');
require_once('../services/Empleados.php');


$empleados = new Empleados();
header("Content-Type: application/json");

// Verifica si la solicitud HTTP es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['_method'] ?? 'POST';

    if (isset($_POST['accion']) && $_POST['accion'] === 'borrar') {
        $data = $_POST;
        if (isset($data['dni'])) {
            $response = $empleados->deleteEmpleado($data['dni']);
            echo json_encode(["message" => $response, "status" => "success"]);
        } else {
            echo json_encode(["error" => "Se requiere el DNI del empleado", "status" => "error"]);
        }
    } elseif (isset($_POST['accion']) && $_POST['accion'] === 'crear') {
        $data = $_POST;
        if (
            isset(
                $data['dni'],
                $data['email'],
                $data['password'],
                $data['rol'],
                $data['nombre'],
                $data['apellido1'],
                $data['apellido2'],
                $data['calle'],
                $data['numero'],
                $data['cp'],
                $data['poblacion'],
                $data['provincia'],
                $data['tlfno'],
                $data['profesion']
            )
        ) {
            $response = $empleados->newEmpleado(
                $data['dni'],
                $data['email'],
                $data['password'],
                $data['rol'],
                $data['nombre'],
                $data['apellido1'],
                $data['apellido2'],
                $data['calle'],
                $data['numero'],
                $data['cp'],
                $data['poblacion'],
                $data['provincia'],
                $data['tlfno'],
                $data['profesion']
            );
            echo json_encode(["message" => $response, "status" => "success"]);
        } else {
            echo json_encode(["error" => "Todos los campos son obligatorios", "status" => "error"]);
        }
    }




    // Si la solicitud HTTP es de tipo GET
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['dni'])) {
        // Si se ha dado un DNI llama al metodo getEmpleadoByDNI y devuelve el resultado en formato JSON
        $empleado = $empleados->getEmpleadoByDNI($_GET['dni']);
        echo json_encode($empleado);
    } elseif (isset($_GET['accion']) && $_GET['accion'] === 'listarEmpleados') {
        $empleadosList = $empleados->getEmpleados();
        echo json_encode($empleadosList);
    } else {
        echo json_encode(["error" => "Acción no válida", "status" => "error"]);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(["error" => "Método no permitido", "status" => "error"]);
}
