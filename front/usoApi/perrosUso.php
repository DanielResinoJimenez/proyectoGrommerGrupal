<?php

require_once __DIR__ . '/../views/perrosView.php';
//Incluir el archivo de servicios
// require_once __DIR__ . '../../../api/services/Clientes.php';



class PerrosUso
{
    private $view;
    // private $clientes;

    // Constructor de la clase . Inicializa los objetos model y view.
    public function __construct()
    {
        $this->view = new PerrosView();
        // $this->clientes = new Clientes();
    }

    // Función que muestra la vista de clientes
    // public function modificarPerro()
    // {
    //     // URL base de la API local
    //     $base_url = 'http://localhost/gromer/api/controllers/perrosController.php';

    //     // Petición POST
    //     $get_url = $base_url . '?accion=listar';
    //     $ch = curl_init($get_url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPGET, true);
    //     $get_response = curl_exec($ch);
    //     if ($get_response === false) {
    //         echo 'Error en la petición GET: ' . curl_error($ch);
    //     } else {
    //         $data = json_decode($get_response, true);
    //         $clientesLista = $data;
    //     }
    //     curl_close($ch);


    //     $this->view->getAllClientes($clientesLista);
    // }

    //Funcióon para crear un nuevo perro
    public function crearPerro()
    {
        // URL de la API
        $base_url = 'http://localhost/gromer/api/controllers/perrosController.php';

        // Petición POST
        $_SERVER["REQUEST_METHOD"] = "POST";

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
            print_r($data);
            $perroInsertado = $data;
        }
        curl_close($ch);
        if (isset($perroInsertado['status'])) {
            if ($perroInsertado['status'] === "success") {
                echo "<script>alert('" . $perroInsertado['menssage'] . "');</script>";
                $this->showFormController();
                return;
            }
        }
    }


    //Funcion para mostrar el formulario de creacion de clientes
    public function showFormController()
    {
        $this->view->mostrarFormularioCrearPerro();
    }
}
