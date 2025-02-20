<?php

require_once __DIR__ . '/../views/serviciosView.php';



class ServiciosUso
{
    private $view;

    public function __construct()
    {
        $this->view = new ServiciosView();
    }

    public function showServicios()
    {
        $base_url = 'http://localhost/gromer/api/controllers/servicioController.php';

        // Petición GET
        $get_url = $base_url;
        $ch = curl_init($get_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        $get_response = curl_exec($ch);
        if ($get_response === false) {
            echo 'Error en la petición GET: ' . curl_error($ch);
        } else {
            $data = json_decode($get_response, true);
            $serviciosLista = $data;
        }
        curl_close($ch);

        $this->view->showServices($serviciosLista);
    }
    
}
