
<main>
        <h3>REGISTRARSE</h3>
        <form action="<?php echo $this->url('web','registro'); ?>" method="POST">
        <label for="Name">Nombre de usuario</label>
        <input type="text" id="Name" name="Name" />
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" />
        <label for="email">Email</label>
        <input type="email" id="email" name="email" />
        <input type="submit" value="Registrarse">
    </form>
</main>
