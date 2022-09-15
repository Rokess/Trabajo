
<main>
    <header>
        <h2>Almacen, añadir nuevas piezas y proveedores</h2>
    </header>
    <main>
        <?php if (isset($almacen) && count($almacen) > 0) { ?>
            <table>
                <tr>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Descuento</th>
                    <th>Precio</th>
                    <th>Proveedor</th>
                </tr>
                <?php
                foreach ($almacen as $row) {
                    echo"<tr>";
                    echo"<td>" . $row['descripcion'] . "</td>";
                    echo"<td>" . $row['cantidad'] . "</td>";
                    echo"<td>" . $row['descuento'] . "</td>";
                    echo"<td>" . $row['precio'] . "</td>";
                    echo"<td>" . $row['nombre'] . "</td>";
                    echo"</tr>";
                }
                ?>
            </table>
        <?php }
        ?>
        <?php if (isset($proveedor) && count($proveedor) > 0) { ?>
            <table>
                <tr>
                    <th>CIF</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Nombre</th>
                </tr>
                <?php
                foreach ($almacen as $row) {
                    echo"<tr>";
                    echo"<td>" . $row['cif'] . "</td>";
                    echo"<td>" . $row['direccion'] . "</td>";
                    echo"<td>" . $row['telefono'] . "</td>";
                    echo"<td>" . $row['nombre'] . "</td>";
                    echo"</tr>";
                }
                ?>
            </table>
        <?php }
        ?>
        <hr>
        <form action="<?php echo $this->url('web', 'buscarProveedor'); ?>" method="POST">
            <label for="proveedor">Buscar por proveedor</label>
            <input type="text" name="proveedor" id="proveedor">
            <input type="submit" value="Enviar"><br>
        </form>
        <br />
        <form action="<?php echo $this->url('web', 'buscarDescripcion'); ?>" method="POST">
            <label for="nombre">Buscar por tipo</label>
            <select name="nombre">
                <?php
                foreach ($all as $row) {
                    echo"<option value='" . $row['descripcion'] . "'>" . $row['descripcion'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Enviar">
        </form>
        <hr>
        <h3>Agregar nuevo articulo al almacen</h3>
        <form action="<?php echo $this->url('web', 'insertarAlmacen'); ?>" method="POST">
            <label for="cantidad">Cantidad</label>
            <input type="text" name="cantidad" id="cantidad"><br /><br />
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion"><br /><br />
            <label for="descuento">Descuento</label>
            <input type="text" name="descuento" id="descuento"><br /><br />
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio"><br /><br />
            <label for="nombre">Nombre</label>
            <select name="nombre">
                <?php
                $id = 0;
                foreach ($prov as $row) {
                    echo"<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                    $id = $row['piezaId'];
                }
                $id = $id + 1;
                ?>
            </select>
            <?php
            echo '<input type = "hidden" name = "id" value="' . $id . '">';
            ?><br /><br />
            <input type="submit" value="Enviar">
        </form>
        <hr>
        <h3>Agregar nuevo proveedor</h3>
        <form action="<?php echo $this->url('web', 'insertarProveedor'); ?>" method="POST">
            <label for="cif">Cif</label>
            <input type="text" name="cif" id="cif">
            <label for="direccion">Direccion</label>
            <input type="text" name="direccion" id="direccion">
            <label for="telefono">Telefono</label>
            <input type="number" name="telefono" id="telefono">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <input type="submit" value="Enviar">
        </form>
    </main>
</main>
