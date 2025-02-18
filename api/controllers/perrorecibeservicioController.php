<?php

require_once('./../bd.php');
require_once('./../services/PerroRecibeServicio.php');
$prs = new PerroRecibeServicio();

@header("Content-type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    if ($action === 'listarPerroRecibeServicio') {
        $listaServ = $prs->getPerroRecibeServicio();
        echo json_encode($listaServ);
        exit();
    } else if ($action === 'listarServicioPorEmpleado' && isset($_GET['dni'])) {
        $listaEmpServ = $prs->getServiciosPorEmpleado($_GET['dni']);
        echo json_encode($listaEmpServ);
        exit();
    }
}


// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
