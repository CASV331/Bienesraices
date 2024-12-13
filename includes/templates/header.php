<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Racices</title>
    <link rel="stylesheet" href="/Bienesraices/build/css/app.css" />
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a class="logo-header" href="/Bienesraices/index.php">
                    <img src="/Bienesraices/build/img/logo.svg" alt="Logotipo de bienes raices" />
                </a>
                <div class="contenedor-menu">
                    <div class="mobile-menu">
                        <div class="menu">
                            <span class="line line1"></span>
                            <span class="line line2"></span>
                            <span class="line line3"></span>
                        </div>
                    </div>
                    <div class="derecha">
                        <img class="dark-mode" src="/Bienesraices/build/img/dark-mode.svg" />
                        <nav class="navegacion">
                            <a href="nosotros.php">Nosotros</a>
                            <a href="anuncios.php">Anuncios</a>
                            <a href="blog.php">Blog</a>
                            <a href="contacto.php">Contacto</a>
                            <?php if ($auth): ?>
                                <a href="cerrar_sesion.php">Cerrar sesión</a>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </div>
            <!--barra-->
            <?php if ($inicio) { ?>
                <h1>Venta de casas y departamentos exclusivos de lujo</h1>
            <?php } ?>
        </div>
    </header>