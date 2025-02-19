<?php

require_once ('./../bd.php');
require_once ('./../services/PerroRecibeServicio.php');
$dep = new PerroRecibeServicio();

@header("Content-type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    if ($action === 'listarPerroRecibeServicio') {
        $listaServ = $dep->getPerroRecibeServicio();
        echo json_encode($listaServ);
        exit();
    } else if ($action === 'listarServicioPorEmpleado' && isset($_GET['dni'])) {
        $listaEmpServ = $dep->getServiciosPorEmpleado($_GET['dni']);
        echo json_encode($listaEmpServ);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['id'] ?? null;

    if ($id) {
        $result = $dep->deleteServiRealizado($id);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Servicio deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete servicio']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $perro_id = $input['perro_id'] ?? null;
    $servicio_id = $input['servicio_id'] ?? null;
    $fecha = $input['fecha'] ?? null;
    $empleado_id = $input['empleado_id'] ?? null;
    $precioFinal = $input['precioFinal'] ?? null;
    $incidencias = $input['incidencias'] ?? null;

    if ($perro_id && $servicio_id && $fecha && $empleado_id && $precioFinal && $incidencias) {
        $result = $dep->newServiRealizado($perro_id, $servicio_id, $fecha, $empleado_id, $precioFinal, $incidencias);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Servicio created successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to create servicio']);
        }
    }
    exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
echo json_encode(["message" => "Solicitud no válida"]);
?>
