
<main>
    <header>
        <h2>CONTACTO E INFORMACION</h2>
    </header>
    <main class="flex">
        <div class="button">
            <h3>Vista de almacen y proveedores</h3>
            <form action="<?php echo $this->url('web', 'verAlmacen'); ?>" method="POST">
                <input type="submit" value="Almacen &#x1f4e6;">
            </form>   
        </div>

        <div class="button">
            <h3>Vista de vehiculos</h3>
            <form action="<?php echo $this->url('web', 'verVehiculos'); ?>" method="POST">
                <input type="submit" value="Vehiculos &#x1f698;">
            </form>
        </div>

        <div class="button">
            <h3>Vista de operaciones</h3>
            <form action="<?php echo $this->url('web', 'verOperaciones'); ?>" method="POST">
                <input type="submit" value="Operaciones &#x1f4c4;">
            </form>
        </div>

    </main>
</main>
