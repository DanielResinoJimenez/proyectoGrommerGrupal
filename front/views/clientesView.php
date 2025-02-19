<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>

<body class="bg-gray-100 bg-custom">
    <div class="container mx-auto p-4 w-[90%]">
        <h1 class="text-2xl font-bold mb-4">Gestión de Clientes</h1>

        <!-- Botón para mostrar el modal -->
        <button onclick="toggleModal()" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Crear Cliente</button>

        <!-- Modal oculto inicialmente -->
        <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white p-4 rounded shadow-lg w-1/2">
                <h2 class="text-xl font-bold mb-2">Crear Cliente</h2>
                <form id="crearClienteForm" class="space-y-4" method="POST" action="">
                    <div>
                        <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
                        <input type="text" id="dni" name="dni" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="apellido1" class="block text-sm font-medium text-gray-700">Apellido 1</label>
                        <input type="text" id="apellido1" name="apellido1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="apellido2" class="block text-sm font-medium text-gray-700">Apellido 2</label>
                        <input type="text" id="apellido2" name="apellido2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" id="direccion" name="direccion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="toggleModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Cliente</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal para mostrar mensajes -->
        <div id="messageModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center <?php echo isset($_POST['dni']) ? '' : 'hidden'; ?>">
            <div class="bg-white p-4 rounded shadow-lg w-1/2">
                <h2 class="text-xl font-bold mb-2">Mensaje</h2>
                <p id="messageText" class="mb-4">
                    <?php
                    if (isset($_POST['dni'])) {
                        require_once '../services/Clientes.php';
                        $clientes = new Clientes();
                        $resultado = $clientes->newCliente($_POST['dni'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['direccion'], $_POST['telefono']);
                        echo $resultado;
                    }
                    ?>
                </p>
                <button onclick="toggleMessageModal()" class="bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
        </div>

        <!-- Lista de clientes -->
        <div class="bg-white p-4 rounded shadow mb-4 overflow-x-auto">
            <h2 class="text-xl font-bold mb-2">Lista de Clientes</h2>
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido 1</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido 2</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody id="clientesLista" class="bg-white divide-y divide-gray-200">
                    <?php
                    // Incluir el archivo de servicios
                    require_once '../services/Clientes.php';

                    // Crear una instancia de la clase Clientes
                    $clientes = new Clientes();

                    // Obtener la lista de clientes
                    $clientesLista = $clientes->getClientes();

                    // Iterar sobre la lista de clientes y generar las filas de la tabla
                    foreach ($clientesLista as $cliente) {
                        echo "<tr>";
                        echo "<td class='px-4 py-2 whitespace-nowrap'>{$cliente['Dni']}</td>";
                        echo "<td class='px-4 py-2 whitespace-nowrap'>{$cliente['Nombre']}</td>";
                        echo "<td class='px-4 py-2 whitespace-nowrap'>{$cliente['Apellido1']}</td>";
                        echo "<td class='px-4 py-2 whitespace-nowrap'>{$cliente['Apellido2']}</td>";
                        echo "<td class='px-4 py-2 whitespace-nowrap'>{$cliente['Direccion']}</td>";
                        echo "<td class='px-4 py-2 whitespace-nowrap'>" . (isset($cliente['telefono']) ? $cliente['telefono'] : 'N/A') . "</td>";
                        echo "<td class='px-4 py-2 whitespace-nowrap'>";
                        echo "<form method='POST' action='http://localhost/Proyecto_DWES/api/controllers/clientesController.php?accion=borrar' style='display:inline;'>";
                        echo "<input type='hidden' name='dni' value='{$cliente['Dni']}'>";
                        echo "<button type='submit' class='bg-red-500 text-white px-4 py-2 rounded'>Borrar</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }

        function toggleMessageModal() {
            const messageModal = document.getElementById('messageModal');
            messageModal.classList.toggle('hidden');
        }
    </script>
</body>

</html>