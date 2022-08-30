
<main>
    <header>
        <h2>Buscador de vehiculos y añadir nuevos vehiculos</h2>
    </header>
    <main>
        <?php if (isset($operaciones)) { ?>
            <table>
                <tr>
                    <th>Pieza</th>
                    <th>Horas</th>
                    <th>Pago</th>
                    <th>Matricula</th>
                    <th>Presupuesto</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </tr>
                <?php
                foreach ($operaciones as $row) {
                    echo"<tr>";
                    foreach ($pieza as $row2) {
                        if($row2['piezaId'] == $row['piezaId']){
                            echo"<td>" . $row2['descripcion'] . "</td>";
                        }
                    }
                    echo"<td>" . $row['horas'] . "</td>";
                    echo"<td>" . $row['pago'] . "</td>";
                    echo"<td>" . $row['matricula'] . "</td>";
                    echo"<td>" . $row['presupuesto'] . "</td>";
                    echo"<td>Modificar</td>";
                    echo"<td>Borrar</td>";
                    echo"</tr>";
                }
                ?>
            </table>
        <?php }
        ?>
        </table>
        <hr>
        <form action="<?php echo $this->url('web', 'buscarOperaciones'); ?>" method="POST">
            <label for="matricula">Buscar por matricula</label>
            <input type="text" name="matricula" id="matricula">
            <input type="submit" value="Enviar">
        </form>
        <hr>
        <h3>Agregar nuevo vehiculo</h3>
        <form action="<?php echo $this->url('web', 'insertarOperacion'); ?>" method="POST">
            <label for="horas">Horas</label>
            <input type="number" name="horas" id="horas">
            <label for="pago">Pago</label>
            <input type="text" name="pago" id="pago">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula" id="matricula">
            <label for="presupuesto">Presupuesto</label>
            <input type="checkbox" name="presupuesto" id="presupuesto">
            <label for="pieza">Pieza</label>
            <select name="pieza">
                <?php
                foreach ($pieza as $row) {
                    echo"<option value='" . $row['piezaId'] . "'>" . $row['descripcion'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Enviar">
        </form>
    </main>
</main>
