<footer class="footer">
    <div>
        <ul class="footer_ul">
            <form action="<?php echo $this->url('web', 'verIndex'); ?>" method="POST">
                <input type="submit" value="Index">
            </form>
            <form action="<?php echo $this->url('web', 'verSuscripcion'); ?>" method="POST">
                <input type="submit" value="Suscripcion">
            </form>
            <form action="<?php echo $this->url('web', 'verContacto'); ?>" method="POST">
                <input type="submit" value="Contacto">
            </form>
        </ul>
    </div>
    <div>
        <h2>REDES SOCIALES</h2>
        <div class="footer_img">
            <img src="./assets/images/insta.png">
            <img src="./assets/images/facebook.png">
            <img src="./assets/images/gmail.png">
        </div>
    </div>
</footer>
</div>
<script src="../js/script.js"></script>
</body>
</html>