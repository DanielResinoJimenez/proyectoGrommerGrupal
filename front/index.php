<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-blue-100 min-h-screen">
    <header class="bg-blue-200 flex justify-between items-center p-8">
        <a href="./index.php"><h1 class="text-purple-500 font-bold text-5xl">Biblioteca Ribera</h1></a>
        <?php
            session_start();
            if(isset($_SESSION['token'])){
        ?>
        <div class="flex justify-between gap-8">
            <a class="text-purple-500 font-semibold text-xl" href="index.php"><p>Libros</p></a>
            <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=PrestamosController&action=mostrarPrestamos"><p>Mis libros prestados</p></a>
            <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=UsersController&action=cerrarSesion"><p>Log Out</p></a>
        </div>
        <?php
            }
        ?>
    </header>
    <div class="container mx-auto text-center">
        <?php
        // Incluye el front controller
        require_once 'FrontController.php';
        ?>
    </div>

</body>
</html>

