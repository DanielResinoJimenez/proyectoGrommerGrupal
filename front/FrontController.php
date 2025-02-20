<?php
    // Define las constantes para los controladores y las acciones predeterminadas
    define('CONTROLADOR_DEFECTO', 'EmpleadosUso');
    define('ACCION_DEFECTO', 'showEmpleados');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Verifica si el token está en la sesión
    // if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
        // Si existe un token, redirige a la lista de libros
        if (!isset($_GET['controller']) || !isset($_GET['action'])) {
            header('Location: index.php?controller=EmpleadosUso&action=showEmpleados');
            exit();
        }
        if($_GET['controller']=='UsersController') header('Location: ./index.php');
    // }

    // Obtén el controlador y la acción desde los parámetros de la URL
    $controller = isset($_GET['controller']) ? $_GET['controller'] : CONTROLADOR_DEFECTO;
    $action = isset($_GET['action']) ? $_GET['action'] : ACCION_DEFECTO;

    // Determina la ruta del controlador
    $controllerFile = __DIR__ . '/usoApi/' . $controller . '.php';

    // Verifica si el controlador existe
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        
        // Crea una instancia del controlador
        $controllerObj = new $controller();
        
        // Verifica si la acción existe en el controlador
        if (method_exists($controllerObj, $action)) {
            // Llama a la acción
            $controllerObj->$action();
        } else {
            // Acción no encontrada, muestra un error
            echo "La acción '$action' no existe en el controlador '$controller'.";
        }
    } else {
        // Controlador no encontrado, muestra un error
        echo "El controlador '$controller' no existe.";
    }
?>
