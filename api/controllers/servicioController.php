<?php

require_once ('./../bd.php');
require_once ('./../services/Servicio.php');
$dep = new Servicio();

@header("Content-type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod= "";
    if (isset($_POST['belleza']) && isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['descripcion'])) {
        $res = $dep->numCod($_POST['belleza']);
        if($_POST['belleza'] == "true"){
            $cod = "SVBE" . $res;
        }else{
            $cod = "SVNUT" . $res;
        }
        $insert = $dep->newServicio($cod, $_POST['nombre'], $_POST['precio'], $_POST['descripcion']);
        return $insert;
        exit();
    }
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
