<?php

class PerrosView
{

    public function mostrarFormularioCrearPerro()
    {
?>
        <div id="modal" class="fixed inset-0 bg-gray-600 dark:bg-gray-400 bg-opacity-50 flex items-center justify-center ">
            <div class="bg-white dark:bg-black p-4 rounded shadow-lg w-1/2">
                <h2 class="text-xl font-bold mb-2">Crear un nuevo perro</h2>
                <form id="crearNuevoPerro" class="space-y-4" method="POST" action="http://localhost/gromer/front/index.php?controller=perrosUso&action=crearPerro">
                    <div>
                        <label for="dni" class="block text-sm font-medium text-gray-700 dark:text-gray-200">DNI del dueño:</label>
                        <input type="text" id="dni" name="dni_duenio" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="fecha_nto" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha de nacimiento:</label>
                        <input type="text" id="fecha_nto" name="fecha_nto" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="raza" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Raza:</label>
                        <input type="text" id="raza" name="raza" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="peso" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Peso:</label>
                        <input type="text" id="peso" name="peso" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="altura" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Altura:</label>
                        <input type="text" id="altura" name="altura" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="observaciones" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Observaciones:</label>
                        <input type="text" id="observaciones" name="observaciones" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="numero_chip" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Numero de chip:</label>
                        <input type="text" id="numero_chip" name="numero_chip" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div>
                        <label for="sexo" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Sexo:</label>
                        <input type="text" id="sexo" name="sexo" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm p-2">
                    </div>
                    <div class="flex justify-end">
                        <a href="http://localhost/gromer/front/index.php?controller=perrosUso&action=mostrarPerrosPorCliente&clienteDni="><button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</button></a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Nuevo Perro</button>
                    </div>
                </form>
            </div>
        </div>

    <?php
    }

    public function mostrarPerrosPorCliente($perrosCliente)
    {
    ?>

        <!-- Lista de clientes -->
        <div class="bg-white p-4 rounded shadow mb-4 overflow-x-auto">
            <h2 class="text-xl font-bold mb-2">Lista de Clientes</h2>
            <a href="http://localhost/gromer/front/index.php?controller=perrosUso&action=showFormController"><button class="bg-green-500 text-white px-4 py-2 rounded">Insertar nuevo perro</button></a>
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 dark:bg-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">DNI del dueño</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Nombre</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Fecha de nacimiento</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Raza</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Peso</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Altura</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Observaciones</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Número de chip</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Sexo</th>
                    </tr>
                </thead>
                <tbody id="listaPerros" class="bg-white divide-y divide-gray-200">
                    <?php

                    if (is_array($perrosCliente)) {
                        foreach ($perrosCliente as $perro) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Dni_duenio']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Nombre']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Fecha_Nto']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Raza']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Peso']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Altura']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Observaciones']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Numero_Chip']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$perro['Sexo']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>";
                            echo "<form method='POST' action='http://localhost/gromer/api/controllers/perrosController.php?accion=borrar' style='display:inline;'>";
                            echo "<input type='hidden' name='dni' value='{$perro['Numero_Chip']}'>";
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
<?php
                    }
                }
            }
