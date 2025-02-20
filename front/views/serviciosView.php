<?php
class ServiciosView{
  
    // updatear crear y mostar Todos los servicios


    public function showServices($listaServices){
        ?>
        <div class="bg-white p-4 rounded shadow mb-4 overflow-x-auto">
            <h2 class="text-xl font-bold mb-2">Lista de Servicios</h2>
            <a href="http://localhost/gromer/front/index.php?controller=clientesUso&action=showFormController"><button>Crear Cliente</button></a>
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Codigo </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripcion</th>
                    </tr>
                </thead>
                <tbody id="serviciosLista" class="bg-white divide-y divide-gray-200">
                    <?php

                    if (is_array($listaServices)) {
                        foreach ($listaServices as $servicio) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$servicio['Codigo']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$servicio['Nombre']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$servicio['Precio']}</td>";
                            echo "<td class='px-4 py-2 whitespace-nowrap'>{$servicio['Descripcion']}</td>";
                            // echo "<form method='POST' action='http://localhost/Proyecto_DWES/api/controllers/clientesController.php?accion=borrar' style='display:inline;'>";
                            // echo "<input type='hidden' name='dni' value='{$cliente['Dni']}'>";
                            // echo "<button type='submit' class='bg-red-500 text-white px-4 py-2 rounded'>Borrar</button>";
                            // echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?php
    }
}