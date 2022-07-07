<?php
use DaVinci\Session\Session;
require_once __DIR__ . '/../bootstrap/init.php';

$rutas = [
    'iniciar-sesion' => [
        'titulo' => 'Iniciar Sesión',
    ],
    'dashboard' => [
        'titulo' => 'Dashboard',
        'requiereAutenticacion' => true,
    ],
    'blog' => [
        'titulo' => 'Administración de Noticias',
        'requiereAutenticacion' => true,
    ],
    'nueva-noticia' => [
        'titulo' => 'Crear nueva Noticia',
        'requiereAutenticacion' => true,
    ],

    'noticia-editar' => [
        'titulo' => 'Editar Noticia',
        'requiereAutenticacion' => true,
    ],
    'noticia-eliminar' => [
        'titulo' => 'Confirmar Eliminar Noticia',
        'requiereAutenticacion' => true,
    ],
    '404' => [
        'titulo' => 'Página no encontrada',
    ],
];

$vista = $_GET['s'] ?? 'dashboard';

if(!isset($rutas[$vista])) {
    $vista = '404';
}

$rutaConfig = $rutas[$vista];

$mensajeExito = (new Session())->flash('mensaje_exito');
$mensajeError = (new Session())->flash('mensaje_error');

$autenticacion = new Davinci\Auth\Autenticacion();

$requiereAutenticacion = $rutaConfig['requiereAutenticacion'] ?? false;

if($requiereAutenticacion && !$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Se requiere haber iniciado sesión para acceder a esta pantalla";
    header('Location: index.php?s=iniciar-sesion');
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $rutaConfig['titulo'];?> :: Panel de Administración para Mascotas</title>
    <?php

    ?>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<header>
    <h1>Mascotas</h1>
    <nav>
        <?php
        if($autenticacion->estaAutenticado()) :
        ?>
        <ul>
            <li>
                <a href="index.php?s=dashboard">Dashboard</a>
            </li>
            <li>
                <a href="index.php?s=blog">Blog</a>
            </li>
            <li>
                <form action="acciones/auth-cerrar-sesion.php" method="post">
                    <button type="submit"><?= $autenticacion->getUsuario()->getEmail();?> (Cerrar Sesión)</button>
                </form>
            </li>
        </ul>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>

    <?php
    if ($mensajeExito !== null) :
    ?>
    <div><?=$mensajeExito;?></div>
    <?php
    endif;
    ?>

    <?php
    if ($mensajeError !== null) :
        ?>
        <div><?=$mensajeError;?></div>
    <?php
    endif;
    ?>

    <?php

    $fileName = __DIR__ . '/vistas/' . $vista . '.php';

    if (file_exists($fileName)) {
        require $fileName;
    } else {
        require __DIR__ . '/vistas/404.php';
    }

    ?>

</main>
<footer>
    <ul>
        <li>
            <a href="https://www.facebook.com" target="_blank">Facebook</a>
        </li>
        <li>
            <a href="https://twitter.com" target="_blank">Twitter</a>
        </li>
        <li>
            <a href="https://www.instagram.com" target="_blank">Instagram</a>
        </li>
        <li>
            <a href="https://www.youtube.com" target="_blank">Youtube</a>
        </li>
    </ul>
    <p>&copy; Este sitio es una entrega para un TP de la Escuela Da Vinci, en el año 2022</p>
</footer>

</body>
</html>