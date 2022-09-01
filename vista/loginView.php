
            <main>
                <h3>INCIAR SESION</h3>
                <form action="<?php echo $this->url(
                    'web',
                    'comprobarusuclave'
                ); ?>" method="POST">
                    <label for="Name">Nombre de usuario</label>
                    <input type="text" id="nombre" name="nombre" />
                    <label for="clave">Contraseña</label>
                    <input name="clave" type="password"/>
                    <input type="submit" value="Iniciar sesion">
                </form>
            </main>
