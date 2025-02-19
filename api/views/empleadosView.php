<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-100 via-indigo-200 to-pink-200">

<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-10">Gestión de Empleados</h1>

    <!-- Formulario para agregar un nuevo empleado -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Nuevo Empleado</h2>
        <form action="../controllers/empleadosController.php" method="post">
            <input type="hidden" name="accion" value="nuevo_empleado">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label for="dni" class="block text-gray-700">DNI</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="dni" name="dni" required>
                </div>
                <div class="form-group">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" class="form-control w-full border rounded-lg py-3 px-4" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" class="form-control w-full border rounded-lg py-3 px-4" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="rol" class="block text-gray-700">Rol</label>
                    <select class="form-control w-full border rounded-lg py-3 px-4" id="rol" name="rol" required>
                        <option value="EMPLEADO">EMPLEADO</option>
                        <option value="AUXILIAR">AUXILIAR</option>
                        <option value="ADMIN">ADMIN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block text-gray-700">Nombre</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido1" class="block text-gray-700">Apellido 1</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="apellido1" name="apellido1" required>
                </div>
                <div class="form-group">
                    <label for="apellido2" class="block text-gray-700">Apellido 2</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="apellido2" name="apellido2" required>
                </div>
                <div class="form-group">
                    <label for="calle" class="block text-gray-700">Calle</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="calle" name="calle" required>
                </div>
                <div class="form-group">
                    <label for="numero" class="block text-gray-700">Número</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="numero" name="numero" required>
                </div>
                <div class="form-group">
                    <label for="cp" class="block text-gray-700">Código Postal</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="cp" name="cp" required>
                </div>
                <div class="form-group">
                    <label for="poblacion" class="block text-gray-700">Población</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="poblacion" name="poblacion" required>
                </div>
                <div class="form-group">
                    <label for="provincia" class="block text-gray-700">Provincia</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="provincia" name="provincia" required>
                </div>
                <div class="form-group">
                    <label for="tlfno" class="block text-gray-700">Teléfono</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="tlfno" name="tlfno" required>
                </div>
                <div class="form-group">
                    <label for="profesion" class="block text-gray-700">Profesión</label>
                    <select class="form-control w-full border rounded-lg py-3 px-4" id="profesion" name="profesion" required>
                        <option value="ESTILISTA">ESTILISTA</option>
                        <option value="NUTRICIONISTA">NUTRICIONISTA</option>
                        <option value="AUXILIAR">AUXILIAR</option>
                        <option value="ATT.CLIENTE">ATT.CLIENTE</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="w-48 bg-green-500 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg mt-6 mx-auto block">Agregar Empleado</button>
        </form>
    </div>

    <!-- Formulario para buscar empleado por DNI -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Buscar Empleado por DNI</h2>
        <form action="../views/empleadosViews.php" method="get">
            <div class="form-group">
                <label for="buscarDni" class="block text-gray-700">DNI</label>
                <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="buscarDni" name="dni" required>
            </div>
           
            <button type="submit" class="w-48 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg mt-6 mx-auto block">Buscar</button>
        </form>
    </div>

    <!-- Formulario para eliminar empleado por DNI -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8 max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Eliminar Empleado</h2>
        <form action="../controllers/empleadosController.php" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
                <label for="eliminarDni" class="block text-gray-700">DNI</label>
                <input type="text" class="form-control w-full border rounded-lg py-3 px-4" id="eliminarDni" name="dni" required>
            </div>
            
            <button type="submit" class="w-48 bg-red-500 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg mt-6 mx-auto block">Eliminar</button>
        </form>
    </div>

    <!-- Mostrar la lista de empleados -->
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Lista de Empleados</h2>
        <form action="../views/empleadosViews.php" method="get" class="text-center mb-6">
            <input type="hidden" name="listar" value="true">
            
            <button type="submit" class="w-48 bg-gray-500 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg">Cargar Empleados</button>
        </form>
        <ul class="list-none space-y-3">
            <?php
            if (isset($_GET['listar']) && $_GET['listar'] === 'true') {
                require_once('../services/Empleados.php');
                $empleados = new Empleados();
                $listaEmpleados = $empleados->getEmpleados();
                if ($listaEmpleados) {
                    foreach ($listaEmpleados as $empleado) {
                        echo "<li class='bg-gray-50 border-gray-200 rounded-lg py-3 px-6'>{$empleado['DNI']} - {$empleado['Nombre']} {$empleado['Apellido1']} {$empleado['Apellido2']}</li>";
                    }
                } else {
                    echo "<li class='bg-gray-50 border-gray-200 rounded-lg py-3 px-6'>Error al cargar la lista de empleados</li>";
                }
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>