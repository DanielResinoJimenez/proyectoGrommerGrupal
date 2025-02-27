<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class', // Esto permite que 'dark:' responda a la clase 'dark' en <html>
        };
    </script>
    <title>RiberaPets</title>
</head>

<body class="bg-blue-100 min-h-screen dark:bg-blue-800/65" x-data="{ darkMode: false }" x-init="
darkMode = localStorage.getItem('darkMode') === 'true';
if (darkMode) document.documentElement.classList.add('dark');
">
    <header class="bg-blue-200 flex justify-between items-center p-8 dark:bg-gray-800">
        <a href="./index.php">
            <h1 class="text-purple-500 font-bold text-5xl dark:text-purple-300">Ribera Pets</h1>
        </a>
        <div class="flex justify-between gap-8">
            <!-- TOGGLE PARA EL MODO DE TEMA (CLARO U OSCURO) -->
            <label class="inline-flex items-center cursor-pointer" x-data="{ checked: false }" x-init="
          checked = localStorage.getItem('darkMode') === 'true';
          if (checked) document.documentElement.classList.add('dark');
          ">
                <input type="checkbox" class="sr-only" x-model="checked" @change="
              document.documentElement.classList.toggle('dark', checked);
              localStorage.setItem('darkMode', checked);
          " />
                <div
                    class="w-20 h-10 rounded-full bg-gradient-to-r from-yellow-300 to-orange-400 transition-all duration-500 border-2 border-gray-500"
                    :class="{ 'from-blue-400 to-indigo-500': checked }">
                    <div
                        class=" mt-[2px] mx-[2px] bg-white rounded-full h-8 w-8 flex items-center justify-center transition-all duration-500 transform"
                        :class="{ 'translate-x-10': checked }">
                        <span x-show="!checked">☀️</span>
                        <span x-show="checked">🌙</span>
                    </div>
                </div>
            </label>
            <?php
            session_start();

            $isLoggedIn = isset($_COOKIE['loggedIn']) && $_COOKIE['loggedIn'] === 'true';
            if ($isLoggedIn) {
            ?>
                <a class="text-purple-500 font-semibold text-xl dark:text-purple-300" href="index.php">
                    <p>Home</p>
                </a>
                <?php
                $isAdmin = isset($_COOKIE['rol']) && $_COOKIE['rol'] === 'ADMIN';
                if ($isAdmin) {
                ?>
                    <a class="text-purple-500 font-semibold text-xl dark:text-purple-300" href="index.php?controller=empleadosUso&action=showEmpleados">
                        <p>Empleados</p>
                    </a>
                <?php
                }
                ?>
                <form id="clientesForm" action="./index.php?controller=clientesUso&action=showClientes" method="post" style="display: inline;">
                    <input type="hidden" name="dniInfo" value="">
                    <a class="text-purple-500 font-semibold text-xl dark:text-purple-300" href="#" onclick="document.getElementById('clientesForm').submit();">
                        <p>Clientes</p>
                    </a>
                </form>
                <a class="text-purple-500 font-semibold text-xl dark:text-purple-300" href="index.php?controller=serviciosUso&action=showServicios">
                    <p>Servicios</p>
                </a>
                <a class="text-purple-500 font-semibold text-xl dark:text-purple-300" href="index.php?controller=perroRecibeServicioUso&action=mostrarServiciosPorPerros">
                    <p>Servicios Realizados</p>
                </a>
                <a class="text-purple-500 font-semibold text-xl dark:text-purple-300" href="index.php?controller=clientesUso&action=logOut">
                    <p>Log Out</p>
                </a>
                <!-- <a class="text-purple-500 font-semibold text-xl" href="index.php?controller=&action=">
                    <p>Perros</p>
                </a> -->
            <?php
            }
            ?>
        </div>
    </header>
    <div class="conatiner m-auto text-center">
        <?php
        // Incluye el front controller
        require_once __DIR__ . '/FrontController.php';
        ?>
    </div>

</body>

</html>