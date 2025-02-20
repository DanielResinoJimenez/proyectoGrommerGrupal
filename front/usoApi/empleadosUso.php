<?php


require_once __DIR__ . '/../views/empeladosView.php';
     //Incluir el archivo
     require_once __DIR__ . '../../api/controllers/empleadosController.php';

class EmpleadosUso{
    private $view;
    private $empleados;

    
    // Constructor de la clase empleadosController. Inicializa el view.
    public function __construct(){
        //QUITAR COMENTARIO
        // $this->view = new EmpleadosView();
        // $this->empleados = new Empleados();
}

// Función para crear un nuevo empleado
    public function showEmpleados(){

   
        //Obtener la lista d empleadsos
        $empleados = $this->empleados->getEmpleados();

        $this->view->showEmpleados();

    }
}