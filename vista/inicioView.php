
<main>
    <header>
        <h2>CONTACTO E INFORMACION</h2>
    </header>
    <main>
        <form action="<?php echo $this->url('web', 'verAlmacen'); ?>" method="POST">
            <input type="submit" value="Almacen">
        </form>
        <form action="<?php echo $this->url('web', 'verVehiculos'); ?>" method="POST">
            <input type="submit" value="Vehiculos">
        </form>
        <form action="<?php echo $this->url('web', 'verOperaciones'); ?>" method="POST">
            <input type="submit" value="Operaciones">
        </form>
    </main>
</main>
