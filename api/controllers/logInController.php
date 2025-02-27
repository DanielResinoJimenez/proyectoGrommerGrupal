<?php

require_once('../bd.php');
require_once('../services/Empleados.php');


$empleados = new Empleados();
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $empleados->getPassMail($email);

        if ($user && password_verify($password, $user['Password'])) {
            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso', 'rol' => $user['Rol'], 'dni' => $user['Dni']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Correo electrónico o contraseña inválidos']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Correo electrónico y contraseña son requeridos']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de solicitud inválido']);
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        $role = $empleados->getRolByEmail($email);
        echo json_encode(['rol' => $role]);
    
        if ($role) {
            echo json_encode(['status' => 'success', 'rol' => $role]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Correo electrónico no encontrado']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Correo electrónico es requerido']);
    }
}

?>