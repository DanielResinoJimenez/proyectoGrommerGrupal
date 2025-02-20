<?php

require_once __DIR__ . '/../views/clientesView.php';
//Incluir el archivo de servicios
// require_once __DIR__ . '../../../api/services/Clientes.php';



class ClientesUso
{
    private $view;
    // private $clientes;

    // Constructor de la clase . Inicializa los objetos model y view.
    public function __construct()
    {
        $this->view = new ClientesView();
        // $this->clientes = new Clientes();
    }

    // Función que muestra la vista de clientes
    public function showClientes()
    {
        // URL base de la API local
        $base_url = 'http://localhost/gromer/api/controllers/clientesController.php';

        // Petición GET
        $get_url = $base_url . '?accion=listar';
        $ch = curl_init($get_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        $get_response = curl_exec($ch);
        if ($get_response === false) {
            echo 'Error en la petición GET: ' . curl_error($ch);
        } else {
            $data = json_decode($get_response, true);
            $clientesLista = $data;
        }
        curl_close($ch);
        // print_r($clientesLista);

        $this->view->getAllClientes($clientesLista);
    }
    //Funcion para mostrar el formulario de creacion de clientes
    public function showFormController()
    {
        $this->view->showForm();
    }
}
