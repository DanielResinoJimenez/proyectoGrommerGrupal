<?php

class PerroRecibeServicio
{
    public function showFormServ()
    {
?>
        <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center dark:bg-gray-900 dark:bg-opacity-80">
            <div class="bg-white p-4 rounded shadow-lg w-1/2 dark:bg-gray-800">
                <h2 class="text-xl font-bold mb-2 dark:text-white">Crear un nuevo servicio realizado</h2>
                <form id="crearNuevoServicio" class="space-y-4" method="POST" action="http://localhost/gromer/front/index.php?controller=perroRecibeServicioUso&action=crearServicioRealizadoAPerro">
                    <div>
                        <label for="dni" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID del perro:</label>
                        <input required type="text" id="dni" name="perro_id" class="mt-1 block w-full border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID del servicio:</label>
                        <input required type="text" id="nombre" name="servicio_id" class="mt-1 block w-full border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="fecha_nto" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de la realización:</label>
                        <input required type="date" id="fecha_nto" name="fecha" class="mt-1 block w-full border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="raza" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID del empleado que lo realiza:</label>
                        <input required type="text" id="raza" name="empleado_id" class="mt-1 block w-full border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="peso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio final:</label>
                        <input required type="number" step=0.01 id="peso" name="precioFinal" class="mt-1 block w-full border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="altura" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Incidencias:</label>
                        <input required type="text" id="altura" name="incidencias" class="mt-1 block w-full border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white rounded-md shadow-sm p-2">
                    </div>
                    <div class="flex justify-end">
                        <a href="http://localhost/gromer/front/index.php?controller=perroRecibeServicioUso&action=mostrarServiciosPorPerros"><button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 dark:bg-gray-700">Cancelar</button></a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded dark:bg-blue-700">Registrar Nuevo Servicio Realizado</button>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }

    public function mostrarServiciosPorPerro($servPorPerro)
    {
    ?>
        <!-- Lista de Servicios hechos a los perros -->
        <div class="bg-white p-4 rounded shadow mb-4 overflow-x-auto dark:bg-gray-800">
            <h2 class="text-xl font-bold mb-2 dark:text-purple-400">Lista de Servicios hechos a los perros</h2>
            <a href="http://localhost/gromer/front/index.php?controller=perroRecibeServicioUso&action=showFormServ">
                <button class="bg-green-500 text-white px-4 py-2 rounded dark:bg-green-700">Insertar un nuevo servicio realizado</button>
            </a>
            <table class="min-w-full divide-y divide-gray-200 text-sm dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Código</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Identificador del servicio</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Identificador del perro</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Fecha</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Incidencias</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Precio final</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">Dni del cliente</th>
                    </tr>
                </thead>
                <tbody id="listaServPorPerro" class="bg-white divide-y divide-gray-200">
                    <?php

                    if (is_array($servPorPerro) && count($servPorPerro) > 0) {
                        foreach ($servPorPerro as $serv) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>{$serv['Sr_Cod']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>{$serv['Cod_Servicio']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>{$serv['ID_Perro']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>{$serv['Fecha']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>{$serv['Incidencias']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>{$serv['Precio_Final']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>{$serv['Dni']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap dark:text-gray-300'>";
                            echo "<form method='POST' action='http://localhost/gromer/front/index.php?controller=perroRecibeServicioUso&action=borrarServicioRealizadoAPerro&Sr_Cod={$serv['Sr_Cod']}' style='display:inline;'>";
                            echo "<input type='hidden' name='dni' value='{$serv['Sr_Cod']}'>";
                            echo "<button type='submit' class='bg-red-500 text-white px-4 py-2 rounded dark:bg-red-700'>Borrar</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center font-bold text-xl text-red-500'>No hay servicios realizados disponibles.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
<?php
    }
}
