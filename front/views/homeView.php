<?php

class HomeView
{

    public function showHomeView()
    {
?>
        <div class="flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('assets/fondo.jpg');">
            <div class="animate-bounce text-center bg-gray-300 bg-opacity-80 p-8 rounded-lg">
                <h1 class="text-3xl font-extrabold text-blue-700">Bienvenido a la Aplicación de Empleados</h1>
                <p class="mt-4 text-lg font-medium text-gray-700">Gestiona la información de tus empleados de manera eficiente.</p>
            </div>
        </div>

<?php
    }
}
