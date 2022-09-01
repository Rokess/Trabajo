
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

                    echo '<tr>';
                    foreach ($pieza as $row2) {
                        if ($row2['piezaId'] == $row['piezaId']) {
                            echo '<td>' . $row2['descripcion'] . '</td>';
                        }
                    }
                    echo '<td>' . $row['horas'] . '</td>';
                    echo '<td>' . $row['pago'] . '</td>';
                    echo '<td>' . $row['matricula'] . '</td>';
                    echo '<td>' . $row['presupuesto'] . '</td>';
                    ?>
                    <form action = "<?php echo $this->url('web', 'borrarModiOperacion'); ?>" method = "post">
                        <input name = "idOpe" type = "text" hidden value = "<?php echo $row['idoperaciones'];?>">
                        <td><input type = "submit" name = "modificar" value = "Modificar" /></td>
                        <td><input type = "submit" name = "borrar" value = "Borrar" /></td>

                    </form><?php
                echo '</tr>';
            }
                ?>
            </table>
        <?php } ?>
        </table>
        <hr>
        <form action="<?php
        echo $this->url(
                'web',
                'buscarOperaciones'
        );
        ?>" method="POST">
            <label for="matricula">Buscar por matricula</label>
            <input type="text" name="matricula" id="matricula">
            <input type="submit" value="Enviar">
        </form>
        <hr>
        <h3>Agregar nuevo vehiculo</h3>
        <form action="<?php echo $this->url('web', $modo); ?>" method="POST">
            <?php
            $id = 0;
            foreach ($oper as $row) {
                $id = $row['idoperaciones'];
            }
            $id = $id + 1;
            ?>
            <?php echo '<input type = "hidden" name = "id" value="' . $id . '">'; ?>
            <label for="horas">Horas</label>
            <input type="number" name="horas" id="horas" value="<?php
            if (
                    isset($operacionModi)
            ) {
                echo $operacionModi[0]['horas'];
            }
            ?>">
            <label for="pago">Pago</label>
            <input type="text" name="pago" id="pago" value="<?php
            if (
                    isset($operacionModi)
            ) {
                echo $operacionModi[0]['pago'];
            }
            ?>">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula" id="matricula" value="<?php
                   if (
                           isset($operacionModi)
                   ) {
                       echo $operacionModi[0]['matricula'];
                   }
                   ?>">
            <label for="presupuesto">Presupuesto</label>
            <?php
            if (isset($operacionModi) && $operacionModi[0]['presupuesto'] == 1) {
                echo '<input type="checkbox" name="presupuesto" id="presupuesto" checked>';
            } else {
                echo '<input type="checkbox" name="presupuesto" id="presupuesto">';
            }
            ?>
            <label for="pieza">Pieza</label>
            <select name="pieza">
                <?php
                foreach ($pieza as $row) {
                    if ($operacionModi[0]['piezaId'] == $row['piezaId']) {
                        echo "<option value='" . $row['piezaId'] . " selected'>" . $row['descripcion'] . "</option>";
                    } else {
                        echo "<option value='" . $row['piezaId'] . "'>" . $row['descripcion'] . "</option>";
                    }
                }
                ?>
            </select>
            <?php
            if (isset($operacionModi)) {
                echo '<input type = "hidden" name = "idoperaciones" value="' . $operacionModi[0]['idoperaciones'] . '">';
            }
            ?>
            <input type="submit" value="Enviar">
        </form>
    </main>
</main>
