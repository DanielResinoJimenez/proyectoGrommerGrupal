<?php

require_once('../bd.php');
require_once('../services/Empleados.php');


$empleados = new Empleados();
header("Content-Type: application/json");

// Verifica si la solicitud HTTP es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['_method'] ?? 'POST';

    if ($method === 'DELETE') {
        $data = $_POST;
        if (isset($data['dni'])) {
            $response = $empleados->deleteEmpleado($data['dni']);
            echo json_encode(["message" => $response, "status" => "success"]);
        } else {
            echo json_encode(["error" => "Se requiere el DNI del empleado", "status" => "error"]);
        }
    } else {
        // Determina el tipo de contenido de la solicitud
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        // Si el tipo de contenido es JSON, decodifica los datos
        if ($contentType === "application/json") {
            $inputData = file_get_contents("php://input");
            $data = json_decode($inputData, true);

       
            // Verifica si hay errores al decodificar el JSON
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo json_encode(["error" => "Error al decodificar JSON", "status" => "error", "inputData" => $inputData]);
                exit;
            }
        } elseif ($contentType === "application/x-www-form-urlencoded") {
            // Si el tipo de contenido es form-urlencoded toma los datos del formulario
            $data = $_POST;
        } else {
            echo json_encode(["error" => "Tipo de contenido no soportado", "status" => "error"]);
            exit;
        }

        // Define los campos requeridos para crear un nuevo empleado
        $requiredFields = ['dni', 'email', 'password', 'rol', 'nombre', 'apellido1', 'apellido2', 'calle', 'numero', 'cp', 'poblacion', 'provincia', 'tlfno', 'profesion'];
        $missingFields = [];

        // Verifica si alguno de los campos requeridos falta en los datos proporcionados
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $missingFields[] = $field;
            }
        }

        // Si todos los campos estan llama al metodo newEmpleado y guarda la respuesta
        if (empty($missingFields)) {
            $response = $empleados->newEmpleado(
                $data['dni'], $data['email'], $data['password'], $data['rol'], 
                $data['nombre'], $data['apellido1'], $data['apellido2'], $data['calle'], 
                $data['numero'], $data['cp'], $data['poblacion'], $data['provincia'], 
                $data['tlfno'], $data['profesion']
            );
            // Devuelve la respuesta en formato JSON
            echo json_encode(["message" => $response, "status" => "success"]);
        } else {
            // Si faltan campos devuelve un error en formato JSON indicando los campos faltantes
            echo json_encode(["error" => "Faltan datos requeridos", "status" => "error", "missingFields" => $missingFields, "data" => $data]);
        }
    }

// Si la solicitud HTTP es de tipo GET
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['dni'])) {
        // Si se ha dado un DNI llama al metodo getEmpleadoByDNI y devuelve el resultado en formato JSON
        $empleado = $empleados->getEmpleadoByDNI($_GET['dni']);
        echo json_encode($empleado);
    } else {
        // Si no se ha dado un DNI llama al metodo getEmpleados y devuelve la lista de empleados en formato JSON
        $empleadosList = $empleados->getEmpleados();
        echo json_encode($empleadosList);
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(["error" => "Método no permitido", "status" => "error"]);
}

?>