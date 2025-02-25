<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>RiberaPets</title>
</head>

<body class="bg-blue-100 min-h-screen">
    <header class="bg-blue-200 flex justify-between items-center p-8">
        <a href="./index.php">
            <h1 class="text-purple-500 font-bold text-5xl">Ribera Pets</h1>
        </a>
        <div class="flex justify-between gap-8">
            <a class="text-purple-500 font-semibold text-xl" href="index.php">
                <p>Home</p>
            </a>
            <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=empleadosUso&action=">
                <p>Empleados</p>
            </a>
            <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=clientesUso&action=showClientes">
                <p>Clientes</p>
            </a>
            <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=serviciosUso&action=showServicios">
                <p>Servicios</p>
            </a>
            <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=perroRecibeServicioUso&action=mostrarServiciosPorPerros">
                <p>Servicios Realizados</p>
            </a>
            <!-- <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=&action=">
                    <p>Perros</p>
                </a> -->
            <!-- <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=&action=">
                    <p>Log Out</p>
                </a> -->
        </div>
    </header>
    <div class="container mx-auto text-center">
        <?php
        // Incluye el front controller
        require_once __DIR__ . '/FrontController.php';
        ?>
    </div>

</body>

</html>