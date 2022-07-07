<?php

require_once __DIR__ . '/../../bootstrap/init.php';

use DaVinci\Auth\Autenticacion;
use DaVinci\Modelos\Noticia;


$autenticacion = new Autenticacion();

if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Se requiere haber iniciado sesión para realizar esta acción";
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}

$noticia_id = $_POST['id'];

$noticia = (new Noticia())->noticiasTraerPorId($noticia_id);


if(!$noticia) {
    $_SESSION['mensaje_error'] = "La noticia que estas tratando de eliminar no parece existir";
    header("Location: ../index.php?s=blog");
    exit;
}

try {
    $noticia->eliminar();
    if(!empty($noticia->getImg() && file_exists(__DIR__ . PATH_IMAGES . $noticia->getImg())))
    {
        unlink(__DIR__ . PATH_IMAGES . $noticia->getImg());
    }
    $_SESSION['mensaje_exito'] = "La noticia <b>'" . $noticia->getTitulo() . "'</b> fue eliminada con éxito";
    header("Location: ../index.php?s=blog");
} catch (Exception $e) {
    $_SESSION['mensaje_error'] = "Ocurrió un problema inesperado al tratar de eliminar <b>'" . $noticia->getTitulo() . "'</b>";
    header("Location: ../index.php?s=blog");
}