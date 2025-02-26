<?php
class EmpleadosView
{
    public function showAddEmpleadoForm()
    {
?>
        <!-- Formulario para agregar un nuevo empleado -->
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8 max-w-3xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6 text-center">Nuevo Empleado</h2>
            <form action="./index.php?controller=empleadosUso&action=createEmpleado" method="post">
                <input type="hidden" name="accion" value="nuevo_empleado">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label for="dni" class="block text-gray-700 dark:text-gray-300">DNI</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="dni" name="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="block text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="rol" class="block text-gray-700 dark:text-gray-300">Rol</label>
                        <select class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="rol" name="rol" required>
                            <option value="EMPLEADO">EMPLEADO</option>
                            <option value="AUXILIAR">AUXILIAR</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="block text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido1" class="block text-gray-700 dark:text-gray-300">Apellido 1</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="apellido1" name="apellido1" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido2" class="block text-gray-700 dark:text-gray-300">Apellido 2</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="apellido2" name="apellido2" required>
                    </div>
                    <div class="form-group">
                        <label for="calle" class="block text-gray-700 dark:text-gray-300">Calle</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="calle" name="calle" required>
                    </div>
                    <div class="form-group">
                        <label for="numero" class="block text-gray-700 dark:text-gray-300">Número</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="numero" name="numero" required>
                    </div>
                    <div class="form-group">
                        <label for="cp" class="block text-gray-700 dark:text-gray-300">Código Postal</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="cp" name="cp" required>
                    </div>
                    <div class="form-group">
                        <label for="poblacion" class="block text-gray-700 dark:text-gray-300">Población</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="poblacion" name="poblacion" required>
                    </div>
                    <div class="form-group">
                        <label for="provincia" class="block text-gray-700 dark:text-gray-300">Provincia</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="provincia" name="provincia" required>
                    </div>
                    <div class="form-group">
                        <label for="tlfno" class="block text-gray-700 dark:text-gray-300">Teléfono</label>
                        <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="tlfno" name="tlfno" required>
                    </div>
                    <div class="form-group">
                        <label for="profesion" class="block text-gray-700 dark:text-gray-300">Profesión</label>
                        <select class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="profesion" name="profesion" required>
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
    <?php
    }

    public function showSearchEmpleadoByDNIForm()
    {
    ?>
        <!-- Formulario para buscar empleado por DNI -->
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8 max-w-3xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6 text-center">Buscar Empleado por DNI</h2>
            <form action="../index.php?controller=empleados&action=addEmpleado" method="get">
                <div class="form-group">
                    <label for="buscarDni" class="block text-gray-700 dark:text-gray-300">DNI</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="buscarDni" name="dni" required>
                </div>

                <button type="submit" class="w-48 bg-blue-500 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg mt-6 mx-auto block">Buscar</button>
            </form>
        </div>
    <?php
    }

    public function showDeleteEmpleadoForm()
    {
    ?>
        <!-- Formulario para eliminar empleado por DNI -->
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg mb-8 max-w-3xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6 text-center">Eliminar Empleado</h2>

            <form action="../index.php?controller=empleados&action=addEmpleado" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group">
                    <label for="eliminarDni" class="block text-gray-700 dark:text-gray-300">DNI</label>
                    <input type="text" class="form-control w-full border rounded-lg py-3 px-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="eliminarDni" name="dni" required>
                </div>

                <button type="submit" class="w-48 bg-red-500 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg mt-6 mx-auto block">Eliminar</button>
            </form>
        </div>
    <?php
    }

    public function showEmpleados($empleadosLista)
    {
    ?>
        <!-- Mostrar la lista de empleados -->
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6 text-center">Lista de Empleados</h2>
            <form action="./index.php?controller=empleadosUso&action=showEmpleados" method="post" class="text-center mb-6">
                <input type="hidden" name="listar" value="true">
                <button type="submit" class="w-48 bg-gray-500 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg">Cargar Empleados</button>
            </form>
            <ul class="list-none space-y-3">
                <?php
                if (!empty($empleadosLista)) {
                    foreach ($empleadosLista as $empleado) {
                        echo "<li class='bg-gray-50 dark:bg-gray-700 border-gray-200 rounded-lg py-3 px-6'>{$empleado['DNI']} - {$empleado['Nombre']} {$empleado['Apellido1']} {$empleado['Apellido2']}</li>";
                    }
                } else {
                    echo "<li class='bg-gray-50 dark:bg-gray-700 border-gray-200 rounded-lg py-3 px-6'>Error al cargar la lista de empleados</li>";
                }
                ?>
            </ul>
        </div>
    <?php
    }

    public function showAllEmpleados($empleadosLista)
    {
    ?>
        <!-- Lista de empleados -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow mb-4 overflow-x-auto">
            <h2 class="text-xl font-bold text-purple-600 dark:text-purple-400 mb-2">Nuestros Empleados</h2>
            <div class="flex justify-between items-center mb-4">
                <a href="http://localhost/gromer/front/index.php?controller=empleadosUso&action=showFormController">
                    <button class="bg-green-500 text-white px-4 py-2 rounded dark:bg-green-700">Nuevo Empleado</button>
                </a>
                <div class="flex items-center">
                    <form method="GET" action="http://localhost/gromer/front/index.php">
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar Empleado</button>
                        <input type="hidden" name="controller" value="empleadosUso">
                        <input type="hidden" name="action" value="getEmpleadoByDNI">
                        <input type="text" name="dni" class="border border-gray-300 rounded-md shadow-sm p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="DNI">
                    </form>
                </div>
            </div>
            <table class="min-w-full divide-y divide-gray-200 text-sm dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">DNI</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Nombre Completo</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Rol</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Dirección</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Población</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Provincia</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Teléfono</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Profesión</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody id="empleadosLista" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    <?php
                    if (!empty($empleadosLista) && $empleadosLista[0] != false) {
                        foreach ($empleadosLista as $empleado) {
                            echo "<tr>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Dni']) ? $empleado['Dni'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Nombre']) ? $empleado['Nombre'] : '') . " " . (isset($empleado['Apellido1']) ? $empleado['Apellido1'] : '') . " " . (isset($empleado['Apellido2']) ? $empleado['Apellido2'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Email']) ? $empleado['Email'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Rol']) ? $empleado['Rol'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Calle']) ? $empleado['Calle'] : '') . ", " . (isset($empleado['Numero']) ? $empleado['Numero'] : '') . ". " . (isset($empleado['Cp']) ? $empleado['Cp'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Poblacion']) ? $empleado['Poblacion'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Provincia']) ? $empleado['Provincia'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Tlfno']) ? $empleado['Tlfno'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap dark:text-gray-300'>" . (isset($empleado['Profesion']) ? $empleado['Profesion'] : '') . "</td>
                                    <td class='px-4 py-2 text-left whitespace-nowrap'>
                                        <a href='http://localhost/gromer/front/index.php?controller=empleadosUso&action=deleteEmpleado&dni=" . (isset($empleado['Dni']) ? $empleado['Dni'] : '') . "' class='bg-red-500 text-white px-4 py-2 rounded dark:bg-red-700'>Eliminar</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='14' class='text-center dark:text-gray-300'>No hay empleados para mostrar</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?php
    }
}
?>