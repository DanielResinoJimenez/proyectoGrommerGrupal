<?php


require_once __DIR__ . '/../views/empleadosView.php';
//Incluir el archivo
//  require_once __DIR__ . './../../api/controllers/empleadosController.php';

class EmpleadosUso
{
    private $view;
    private $empleados;


    // Constructor de la clase empleadosController. Inicializa el view.
    public function __construct()
    {
        //QUITAR COMENTARIO
        $this->view = new EmpleadosView();
    }

    public function showEmpleados()
    {
        // URL base de la API local
        $base_url = 'http://localhost/gromer/api/controllers/empleadosController.php';

        // Petición GET
        $get_url = $base_url . '?accion=listarEmpleados';
        $ch = curl_init($get_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        $get_response = curl_exec($ch);
        if ($get_response === false) {
            echo 'Error en la petición GET: ' . curl_error($ch);
        } else {
            // Imprimir la respuesta JSON para depuración
            // echo '<pre>';
            // echo 'Respuesta JSON: ' . $get_response;
            // echo '</pre>';

            $data = json_decode($get_response, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $empleadosLista = $data;
            } else {
                echo 'Error al decodificar la respuesta JSON: ' . json_last_error_msg();
                $empleadosLista = [];
            }
        }
        curl_close($ch);

        $this->view->showAllEmpleados($empleadosLista);
    }

    //Funcion para obtener un empleado por dni
    public function getEmpleadoByDNI()
    {
        if (isset($_GET['dni'])) {
            $dni = $_GET['dni'];

            // URL base de la API local
            $base_url = 'http://localhost/gromer/api/controllers/empleadosController.php';

            // Petición GET con DNI
            $get_url = $base_url . '?accion=buscarEmpleado&dni=' . urlencode($dni);
            $ch = curl_init($get_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            $get_response = curl_exec($ch);
            if ($get_response === false) {
                echo 'Error en la petición GET: ' . curl_error($ch);
            } else {
                $data = json_decode($get_response, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $empleadosLista = $data;
                } else {
                    echo 'Error al decodificar la respuesta JSON: ' . json_last_error_msg();
                    $empleadosLista = [];
                }
            }
            curl_close($ch);

            $this->view->showAllEmpleados([$empleadosLista]);
        } else {
            echo 'DNI no proporcionado';
        }
    }
    //Funcion para mostrar el formulario de creacion de empleados
    public function showFormController()
    {
        $this->view->showAddEmpleadoForm();
    }

        //funcion para borrar un empleado
        public function deleteEmpleado()
        {
            // Verificar si se ha confirmado la eliminación
            if (isset($_POST['confirmar'])) {
                if ($_POST['confirmar'] == 'sí') {
                    // URL base de la API local
                    $base_url = 'http://localhost/gromer/api/controllers/empleadosController.php';
   
                    $_POST['accion'] = 'borrar';
                    $post_url = $base_url;
                    $ch = curl_init($post_url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
                    $post_response = curl_exec($ch);
  
                    if ($post_response === false) {
                        echo 'Error en la petición POST: ' . curl_error($ch);
                    } else {
                        $data = json_decode($post_response, true);
                        $empleadosLista = $data;
                    }
                    curl_close($ch);
                    if (isset($empleadosLista['mensaje']) && $empleadosLista['mensaje'] == 'El empleado no existe') {
                        echo "<script>alert('" . $empleadosLista['mensaje'] . "');</script>";
                        $this->showFormController($empleadosLista);
                        return;
                    } else {
                        echo "<script>alert('empleado DNI: " . $_POST['dni'] . " borrado correctamente');</script>";
                    }
                    $this->showempleados();
                } else {
                    // Si el usuario dice "No", regresar a la vista de empleados
                    $this->showempleados();
                }
            } else {
                // Mostrar formulario de confirmación
                echo "<form method='POST' action='http://localhost/gromer/front/index.php?controller=empleadosUso&action=deleteEmpleado'>";
                echo "<input type='hidden' name='dni' value='" . $_GET['dni'] . "'>";
                echo "<p class='p-10'>¿Está seguro de eliminar el empleado?</p>";
                echo "<button type='submit' class='bg-green-500 text-white mx-2 px-4 py-2 rounded' name='confirmar' value='sí'>Sí</button>";
                echo "<button type='submit' class='bg-red-500 text-white mx-2 px-4 py-2 rounded' name='confirmar' value='no'>No</button>";
                echo "</form>";
            }
        }

        public function createEmpleado()
        {
            // URL base de la API local
            $base_url = 'http://localhost/gromer/api/controllers/empleadosController.php';
     
            // Petición POST
            $_POST['accion'] = 'crear';
            $post_url = $base_url;
            $ch = curl_init($post_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
            $post_response = curl_exec($ch);
            if ($post_response === false) {
                echo 'Error en la petición POST: ' . curl_error($ch);
            } else {
                // Si el usuario dice "No", regresar a la vista de empleados
                $this->showempleados();
            }
            curl_close($ch);
             if (isset($empleadosLista['mensaje']) && $empleadosLista['mensaje'] == 'El empleado ya está dado de alta') {
                 echo "<script>alert('" . $empleadosLista['mensaje'] . "');</script>";
                 $this->showFormController($empleadosLista);            
                 return;
             }
             $this->showempleados();
        }
    }

    public function createEmpleado()
    {
        // URL base de la API local
        $base_url = 'http://localhost/gromer/api/controllers/empleadosController.php';

        // Petición POST
        $_POST['accion'] = 'crear';
        $post_url = $base_url;
        $ch = curl_init($post_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
        $post_response = curl_exec($ch);

        if ($post_response === false) {
            echo 'Error en la petición POST: ' . curl_error($ch);
        } else {
            $data = json_decode($post_response, true);
            $empleadosLista = $data;
        }
        curl_close($ch);
        if (isset($empleadosLista['mensaje']) && $empleadosLista['mensaje'] == 'El empleado ya está dado de alta') {
            echo "<script>alert('" . $empleadosLista['mensaje'] . "');</script>";
            $this->showFormController($empleadosLista);
            return;
        } else {
            echo "<script>alert('El empleado con DNI: " . $_POST['dni'] . " ya existe');</script>";
        }
        $this->showempleados();
    }
}
