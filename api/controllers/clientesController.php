<?php
require_once ('../services/Clientes.php');

$clientes = new Clientes();

// Verificar si se recibió una acción
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    switch ($accion) {
        case 'crear':
            if (isset($_POST['dni'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['direccion'], $_POST['telefono'])) {
                $dni = $_POST['dni'];
                $nombre = $_POST['nombre'];
                $apellido1 = $_POST['apellido1'];
                $apellido2 = $_POST['apellido2'];
                $direccion = $_POST['direccion'];
                $telefono = $_POST['telefono'];

                $resultado = $clientes->newCliente($dni, $nombre, $apellido1, $apellido2, $direccion, $telefono);
                echo json_encode(["mensaje" => $resultado]);
            } else {
                echo json_encode(["mensaje" => "Faltan datos"]);
            }
            break;

        case 'borrar':
            if (isset($_POST['dni'])) {
                $dni = $_POST['dni'];
                $resultado = $clientes->deleteCliente($dni);
                echo json_encode(["mensaje" => $resultado]);
            } else {
                echo json_encode(["mensaje" => "Faltan datos"]);
            }
            break;

        case 'listar':
            $clientesLista = $clientes->getClientes();
            echo json_encode($clientesLista);
            break;

        case 'obtener':
            if (isset($_GET['dni'])) {
                $dni = $_GET['dni'];
                $cliente = $clientes->getCliente($dni);
                echo json_encode($cliente);
            } else {
                echo json_encode(["mensaje" => "Faltan datos"]);
            }
            break;

        case 'perros':
            if (isset($_GET['dni'])) {
                $dni = $_GET['dni'];
                $perros = $clientes->getPerrosCliente($dni);
                echo json_encode($perros);
            } else {
                echo json_encode(["mensaje" => "Faltan datos"]);
            }
            break;

        default:
            echo json_encode(["mensaje" => "Acción no válida"]);
            break;
    }
} else {
    echo json_encode(["mensaje" => "No se recibió ninguna acción"]);
}
?>



