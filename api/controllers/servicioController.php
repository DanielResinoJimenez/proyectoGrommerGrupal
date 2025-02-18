<?php

require_once ('./../bd.php');
require_once ('./../services/Servicio.php');
$dep = new Servicio();

@header("Content-type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod = "";
    if (isset($_POST['belleza']) && isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['descripcion'])) {
        if (!empty($_POST['belleza']) && !empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['descripcion'])) {
            $res = $dep->numCod($_POST['belleza']);
            if ($_POST['belleza'] == "true") {
                $cod = "SVBE" . $res;
            } else {
                $cod = "SVNUT" . $res;
            }
            $insert = $dep->newServicio($cod, $_POST['nombre'], $_POST['precio'], $_POST['descripcion']);
            if ($insert) {
                header("HTTP/1.1 200 OK");
                echo json_encode(["message" => "Servicio creado exitosamente"]);
            } else {
                header("HTTP/1.1 500 Internal Server Error");
                echo json_encode(["message" => "Error al crear el servicio"]);
            }
        } else {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(["message" => "Todos los campos son obligatorios"]);
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(["message" => "Faltan parámetros"]);
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Analiza los datos brutos de la solicitud PUT y llena el array $_PUT
    parse_str(file_get_contents("php://input"), $_PUT);
    if (isset($_PUT['id']) && isset($_PUT['precio'])) {
        if (!empty($_PUT['id']) && !empty($_PUT['precio'])) {
            $update = $dep->updateServicio($_PUT['id'], $_PUT['precio']);
            if ($update) {
                header("HTTP/1.1 200 OK");
                echo json_encode(["message" => "Precio del servicio actualizado exitosamente"]);
            } else {
                header("HTTP/1.1 500 Internal Server Error");
                echo json_encode(["message" => "Error al actualizar el precio del servicio"]);
            }
        } else {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(["message" => "El ID y el precio son obligatorios"]);
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(["message" => "Faltan parámetros"]);
    }
    exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
echo json_encode(["message" => "Solicitud no válida"]);