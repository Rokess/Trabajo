<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TFG</title>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/normalize.css" rel="stylesheet">
        <style>
            html {
                line-height: 1.15; /* 1 */
                -webkit-text-size-adjust: 100%; /* 2 */
            }
            body {
                margin: 0;
            }
            main {
                display: block;
            }
            h1 {
                font-size: 2em;
                margin: 0.67em 0;
            }
            hr {
                box-sizing: content-box; /* 1 */
                height: 0; /* 1 */
                overflow: visible; /* 2 */
            }
            pre {
                font-family: monospace, monospace; /* 1 */
                font-size: 1em; /* 2 */
            }
            a {
                background-color: transparent;
            }
            abbr[title] {
                border-bottom: none; /* 1 */
                text-decoration: underline; /* 2 */
                text-decoration: underline dotted; /* 2 */
            }
            b,
            strong {
                font-weight: bolder;
            }
            code,
            kbd,
            samp {
                font-family: monospace, monospace; /* 1 */
                font-size: 1em; /* 2 */
            }
            small {
                font-size: 80%;
            }
            sub,
            sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline;
            }

            sub {
                bottom: -0.25em;
            }

            sup {
                top: -0.5em;
            }
            img {
                border-style: none;
            }
            button,
            input,
            optgroup,
            select,
            textarea {
                font-family: inherit; /* 1 */
                font-size: 100%; /* 1 */
                line-height: 1.15; /* 1 */
                margin: 0; /* 2 */
            }
            button,
            input { /* 1 */
                overflow: visible;
            }
            button,
            select { /* 1 */
                text-transform: none;
            }
            button,
            [type="button"],
            [type="reset"],
            [type="submit"] {
                -webkit-appearance: button;
            }
            button::-moz-focus-inner,
            [type="button"]::-moz-focus-inner,
            [type="reset"]::-moz-focus-inner,
            [type="submit"]::-moz-focus-inner {
                border-style: none;
                padding: 0;
            }
            button:-moz-focusring,
            [type="button"]:-moz-focusring,
            [type="reset"]:-moz-focusring,
            [type="submit"]:-moz-focusring {
                outline: 1px dotted ButtonText;
            }
            fieldset {
                padding: 0.35em 0.75em 0.625em;
            }
            legend {
                box-sizing: border-box; /* 1 */
                color: inherit; /* 2 */
                display: table; /* 1 */
                max-width: 100%; /* 1 */
                padding: 0; /* 3 */
                white-space: normal; /* 1 */
            }
            progress {
                vertical-align: baseline;
            }
            textarea {
                overflow: auto;
            }
            [type="checkbox"],
            [type="radio"] {
                box-sizing: border-box; /* 1 */
                padding: 0; /* 2 */
            }
            [type="number"]::-webkit-inner-spin-button,
            [type="number"]::-webkit-outer-spin-button {
                height: auto;
            }
            [type="search"] {
                -webkit-appearance: textfield; /* 1 */
                outline-offset: -2px; /* 2 */
            }
            [type="search"]::-webkit-search-decoration {
                -webkit-appearance: none;
            }
            ::-webkit-file-upload-button {
                -webkit-appearance: button; /* 1 */
                font: inherit; /* 2 */
            }
            details {
                display: block;
            }
            summary {
                display: list-item;
            }
            template {
                display: none;
            }
            [hidden] {
                display: none;
            }
            @font-face {
                font-family: 'LibreBaskerville';
                src: url('../assets/fonts/LibreBaskerville-Regular.ttf') format('truetype');
                font-style: normal;
                font-weight: normal;
            }
            @font-face {
                font-family: 'LibreBaskerville_bold';
                src: url('../assets/fonts/LibreBaskerville-Bold.ttf') format('truetype');
                font-style: normal;
                font-weight: normal;
            }
            .header{
                width: 100%;
                background-color: #c1e3ff;
                display: flex;
                justify-content: space-around ;
            }

            .ul > li{
                display: inline-block;
            }
            .ul > li > a{
                font-family: LibreBaskerville;
                text-decoration: none;
                color: #153f65;
                padding-left: 15px;
                padding-right: 15px;
            }
            .ul > li > a:hover{
                font-family: LibreBaskerville_bold;
                color: #03131f;
            }
            .footer{
                color: #edf4fe;
                background-color: #12222e;
                display: flex;
                justify-content: space-around ;
            }
            .footer_ul{
                text-align: center;
                list-style: none;

            }
            .footer_ul > li{
                padding-bottom: 10px;
            }
            .footer_ul > li > a{
                font-family: LibreBaskerville;
                text-decoration: none;
                color: #edf4fe;
            }
            .footer_img{
                width: 3rem;
                display: flex;
            }
            .footer_img >img{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="header">
                <ul class="ul">
                    <form action="<?php echo $this->url('web', 'verIndex'); ?>" method="POST">
                        <input type="submit" value="Index">
                    </form>
                    <form action="<?php echo $this->url('web', 'verSuscripcion'); ?>" method="POST">
                        <input type="submit" value="Suscripcion">
                    </form>
                    <form action="<?php echo $this->url('web', 'verContacto'); ?>" method="POST">
                        <input type="submit" value="Contacto">
                    </form>
                    <?php if (isset($_SESSION['nombre'])) { ?>
                        <form action="<?php echo $this->url('web', 'verInicio'); ?>" method="POST">
                            <input type="submit" value="Inicio">
                        </form>
                    <?php } ?>
                </ul>
                <h2>KROKOS</h2>
                <?php if (!isset($_SESSION['nombre'])) { ?>
                    <ul class="ul">
                        <form action="<?php echo $this->url('web', 'verLogin'); ?>" method="POST">
                            <input type="submit" value="Login">
                        </form>
                        <form action="<?php echo $this->url('web', 'verSingUp'); ?>" method="POST">
                            <input type="submit" value="SignUp">
                        </form>
                    </ul>
                <?php }else{
                    ?>
                    <ul class="ul">
                        <form action="<?php echo $this->url('web', 'cerrarSesion'); ?>" method="POST">
                            <input type="submit" value="cerrarSesion">
                        </form>
                    </ul>
                <?php
                } ?>
            </header>