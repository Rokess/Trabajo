
<main>
    <header>
        <h2>Buscador de vehiculos y añadir nuevos vehiculos</h2>
    </header>
    <main>
        <?php if (isset($vehiculo)) { ?>
            <table>
                <tr>
                    <th>Matricula</th>
                    <th>Bastidor</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Telefono</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </tr>
                <?php foreach ($vehiculo as $row) {

                    echo '<tr>';
                    echo '<td>' . $row['matricula'] . '</td>';
                    echo '<td>' . $row['bastidor'] . '</td>';
                    echo '<td>' . $row['fecha'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '<td>' . $row['DNI'] . '</td>';
                    echo '<td>' . $row['Telefono'] . '</td>';
                    ?>
                    <form action = "<?php echo $this->url(
                        'web',
                        'borrarModiVehiculo'
                    ); ?>" method = "post">
                        <input name = "matricula" type = "text" hidden value = "<?php echo $row[
                            'matricula'
                        ]; ?>">
                        <td><input type = "submit" name = "modificar" value = "Modificar" /></td>
                        <td><input type = "submit" name = "borrar" value = "Borrar" /></td>

                    </form><?php echo '</tr>';
                } ?>
            </table>
        <?php } ?>
        </table>
        <hr>
        <form action="<?php echo $this->url(
            'web',
            'buscarBastidor'
        ); ?>" method="POST">
            <label for="bastidor">Buscar por bastidor</label>
            <input type="text" name="bastidor" id="bastidor">
            <input type="submit" value="Enviar">
        </form>
        <form action="<?php echo $this->url(
            'web',
            'buscarMatricula'
        ); ?>" method="POST">
            <label for="matricula">Buscar por matricula</label>
            <input type="text" name="matricula" id="matricula">
            <input type="submit" value="Enviar">
        </form>
        <form action="<?php echo $this->url(
            'web',
            'buscarDNI'
        ); ?>" method="POST">
            <label for="dni">Buscar por DNI</label>
            <input type="text" name="dni" id="dni">
            <input type="submit" value="Enviar">
        </form>
        <hr>
        <h3>Agregar nuevo vehiculo</h3>
        <form action="<?php echo $this->url('web', $modo); ?>" method="POST">
            <label for="matricula">Matricula</label>
            <?php if ($modo == 'modificarVehiculo') { ?>
                <input type="text" name="matricula" readonly id="matricula" value="<?php if (
                    isset($vehiculoModi)
                ) {
                    echo $vehiculoModi[0]['matricula'];
                } ?>">
            <?php } else { ?>
                <input type="text" name="matricula" id="matricula" value="<?php if (
                    isset($vehiculoModi)
                ) {
                    echo $vehiculoModi[0]['matricula'];
                } ?>">
            <?php } ?>

            <label for="bastidor">Bastidor</label>
            <input type="text" name="bastidor" id="bastidor" value="<?php if (
                isset($vehiculoModi)
            ) {
                echo $vehiculoModi[0]['bastidor'];
            } ?>">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php if (
                isset($vehiculoModi)
            ) {
                echo $vehiculoModi[0]['fecha'];
            } ?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php if (
                isset($vehiculoModi)
            ) {
                echo $vehiculoModi[0]['nombre'];
            } ?>">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" value="<?php if (
                isset($vehiculoModi)
            ) {
                echo $vehiculoModi[0]['DNI'];
            } ?>">
            <label for="telefono">telefono</label>
            <input type="number" name="telefono" id="telefono" value="<?php if (
                isset($vehiculoModi)
            ) {
                echo $vehiculoModi[0]['Telefono'];
            } ?>">
            <input type="submit" value="Enviar">
        </form>
    </main>
</main>
