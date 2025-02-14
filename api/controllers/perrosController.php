<?php

require_once('./../bd.php');
require_once('./../services/Perros.php');
$dep = new Perros();

@header("Content-type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['dni_duenio']) && isset($_POST['nombre']) && isset($_POST['fecha_nto']) && isset($_POST['raza']) && isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['observaciones']) && isset($_POST['numero_chip']) && isset($_POST['sexo'])) {
        $insert = $dep->newPerro(($_POST['dni_duenio']), ($_POST['nombre']), ($_POST['fecha_nto']), ($_POST['raza']), ($_POST['peso']), ($_POST['altura']), ($_POST['observaciones']), ($_POST['numero_chip']), ($_POST['sexo']));
        echo json_encode(["message" => "Perro registrado correctamente", "status" => "success"]);
        exit();
    } else {
        echo json_encode(["error" => "Faltan datos requeridos", "status" => "error"]);
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if (isset($_POST['chip'])) {
        $dep->deletePerro(($_POST['chip']));
        echo json_encode(["message" => "Perro eliminado correctamente", "status" => "success"]);
        exit();
    } else {
        echo json_encode(["error" => "Se requiere el número de chip", "status" => "error"]);
        exit();
    }
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
