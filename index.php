<?php

require_once __DIR__ . '/bootstrap/init.php';

$rutas = [
    'iniciar-sesion' => [
        'titulo' => 'Página para iniciar sesión',
    ],
    'home' => [
        'titulo' => 'Página Principal',
    ],
    'blog' => [
        'titulo' => 'Blog',
    ],
    'detalle_blog' => [
        'titulo' => 'Noticia',
    ],
    'listado' => [
        'titulo' => 'Productos',
    ],
    'detalle_productos' => [
        'titulo' => 'Detalle de Producto',
    ],
    'contacto' => [
        'titulo' => 'Contacto',
    ],
    '404' => [
        'titulo' => 'Página no encontrada',
    ],
];

$vista = $_GET['s'] ?? 'home';

if(!isset($rutas[$vista])) {
    $vista = '404';
}

$rutaConfig = $rutas[$vista];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mascotas :: <?= $rutaConfig['titulo'];?></title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
        <h1>Mascotas</h1>
        <nav>
            <ul>
                <li>
                    <a href="index.php?s=iniciar-sesion">Iniciar Sesión</a>
                </li>
                <li>
                    <a href="index.php?s=home">Home</a>
                </li>
                <li>
                    <a href="index.php?s=blog">Blog</a>
                </li>
                <li>
                    <a href="index.php?s=listado">Productos</a>
                </li>
                <li>
                    <a href="index.php?s=contacto">Contacto</a>
                </li>
            </ul>
    </nav>
    </header>
    <main>

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