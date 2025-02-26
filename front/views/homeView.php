<?php 

class HomeView{

    public function showHomeView(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        $isLoggedIn = isset($_COOKIE['loggedIn']) && $_COOKIE['loggedIn'] === 'true';
        // $isAdmin = false;
        if (!$isLoggedIn) {
            header('Location: http://localhost/gromer/front/index.php?controller=clientesUso&action=showLogIn');
            exit();
        }
    ?>
        <div class="flex items-center justify-center h-screen">
            <div class="animate-bounce text-center">
                <h1>Bienvenido a la Aplicación de Empleados</h1>
                <p>Gestiona la información de tus empleados de manera eficiente.</p>
            </div>
        </div>

    <?php
    }


}