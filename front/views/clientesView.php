<?php
class ClientesView
{
    public function showForm()
    {
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
        <!-- Modal para crear clientes -->
        <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center ">
            <div class="bg-white p-4 rounded shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-2">Crear Cliente</h2>
                <form id="crearClienteForm" class="space-y-2 text-left" method="POST" action="http://localhost/gromer/front/index.php?controller=clientesUso&action=createCliente">
                    <div>
                        <label for="dni" class="block text-sm font-medium text-blue-400">DNI</label>
                        <input required type="text" id="dni" value="<?php echo isset($_POST['dni']) ? $_POST['dni'] : '' ?>" name="dni" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-blue-400">Nombre</label>
                        <input required type="text" id="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>" name="nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="apellido1" class="block text-sm font-medium text-blue-400">Apellido 1</label>
                        <input required type="text" id="apellido1" value="<?php echo isset($_POST['apellido1']) ? $_POST['apellido1'] : '' ?>" name="apellido1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="apellido2" class="block text-sm font-medium text-blue-400">Apellido 2</label>
                        <input required type="text" id="apellido2" value="<?php echo isset($_POST['apellido2']) ? $_POST['apellido2'] : '' ?>" name="apellido2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="direccion" class="block text-sm font-medium text-blue-400">Dirección</label>
                        <input required type="text" id="direccion" value="<?php echo isset($_POST['direccion']) ? $_POST['direccion'] : '' ?>" name="direccion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-blue-400">Teléfono</label>
                        <input required type="text" id="telefono" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : '' ?>" name="telefono" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="window.location.href='http://localhost/gromer/front/index.php?controller=clientesUso&action=createCliente'" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    public function getAllClientes($clientesLista)
    {
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
        <!-- Lista de clientes -->
        <div class="bg-white p-6 rounded shadow mb-4 overflow-x-auto">
            <h2 class="text-xl font-bold text-purple-600 mb-2">Nuestros Clientes</h2>
            <div class="flex justify-between items-center mb-4">
                <a href="http://localhost/gromer/front/index.php?controller=clientesUso&action=showFormController">
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Nuevo Cliente</button>
                </a>
                <div class="flex items-center">
                    <form id='busqueda' method="POST" action="http://localhost/gromer/front/index.php?controller=clientesUso&action=showClientes">
                        <!-- <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar Cliente</button> -->
                        <!-- <input type="hidden" name="controller" value="clientesUso">
                    <input type="hidden" name="action" value="getCliente"> -->
                        <input oninput="this.form.submit();" type="search" id="default-search" name="dniInfo" class="w-[200px] p-2 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2" value='<?php echo $_POST['dniInfo'] ?>' placeholder="Introduce DNI" autofocus />
                    </form>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const input = document.getElementById('default-search');
                        const dniValue = "<?php echo isset($_POST['dniInfo']) ? addslashes($_POST['dniInfo']) : '' ?>";
                        input.focus(); // Luego enfocas el input
                        input.setSelectionRange(input.value.length, input.value.length); // Cursor al final
                    });
                </script>
            </div>
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido 1</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido 2</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opciones</th>
                    </tr>
                </thead>
                <tbody id="clientesLista" class="bg-white divide-y divide-gray-200">
                    <?php
                    if (is_array($clientesLista) && count($clientesLista) > 0) {
                        foreach ($clientesLista as $cliente) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2 text-left whitespace-nowrap'>{$cliente['Dni']}</td>";
                            echo "<td class='px-4 py-2 text-left whitespace-nowrap'>{$cliente['Nombre']}</td>";
                            echo "<td class='px-4 py-2 text-left whitespace-nowrap'>{$cliente['Apellido1']}</td>";
                            echo "<td class='px-4 py-2 text-left whitespace-nowrap'>{$cliente['Apellido2']}</td>";
                            echo "<td class='px-4 py-2 text-left whitespace-nowrap'>{$cliente['Direccion']}</td>";
                            echo "<td class='px-4 py-2 text-left whitespace-nowrap'>" . (isset($cliente['telefono']) ? $cliente['telefono'] : 'N/A') . "</td>";
                            echo "<td class='px-4 py-2 text-left whitespace-nowrap'>";
                            echo "<button type='submit' class='bg-yellow-700 text-white px-4 py-2 rounded mr-2' onclick='window.location.href=\"http://localhost/gromer/front/index.php?controller=perrosUso&action=mostrarPerrosPorCliente&clienteDni={$cliente['Dni']}\"'>Perros</button>";
                            echo "<form method='POST' action='http://localhost/gromer/front/index.php?controller=clientesUso&action=deleteCliente' style='display:inline;'>";
                            echo "<input type='hidden' name='dni' value='{$cliente['Dni']}'>";
                            echo "<button type='submit' class='bg-red-500 text-white px-4 py-2 rounded'>Borrar</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo '<tr><td colspan="7" class="text-center font-bold text-xl text-red-500">No hay resultados en tu búsqueda</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
<?php
    }
}
