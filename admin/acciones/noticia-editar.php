<?php

use DaVinci\Auth\Autenticacion;
use DaVinci\Modelos\Noticia;
use DaVinci\Validacion\NoticiaValidar;

require_once __DIR__ . '/../../bootstrap/init.php';

$autenticacion = new Autenticacion();

if(!$autenticacion->estaAutenticado()) {
    $_SESSION['mensaje_error'] = "Se requiere haber iniciado sesión para realizar esta acción";
    header('Location: ../index.php?s=iniciar-sesion');
    exit;
}

$noticia_id         = $_POST['id'];
$titulo             = $_POST['titulo'];
$sinopsis           = $_POST['sinopsis'];
$texto              = $_POST['texto'];
$img_descripcion    = $_POST['img_descripcion'];
$img                = $_FILES['img'];

$noticia = (new Noticia())->noticiasTraerPorId($noticia_id);

if(!$noticia) {
    $_SESSION['mensaje_error'] = "La noticia que estás tratando de editar no parece existir.";
    header("Location: ../index.php?s=blog");
    exit;
}

$validador = new NoticiaValidar([
    'titulo' => $titulo,
    'sinopsis' => $sinopsis,
    'texto' => $texto,
    'img' => $img,
    'img_descripcion' => $img_descripcion,
]);

if($validador->hayErrores()) {
    $_SESSION['errores'] = $validador->getErrores();
    $_SESSION['data_form'] = $_POST;

    header("Location: ./../index.php?s=noticia-editar&id=" . $noticia_id);
    exit;
}

if(!empty($img['tmp_name'])) {
    $nombreImg= date('YmdHis_') . slugify($img['name']);
    move_uploaded_file($img['tmp_name'], PATH_IMAGES . '/big-' . $nombreImg);
}

try {
    $noticia->editar([
        'usuarios_usuario_id'   => $autenticacion->getUsuarioId(),
 //       'fecha_publicacion'     => date('Y-m-d H:i:s'),
        'titulo'                => $titulo,
        'sinopsis'              => $sinopsis,
        'texto'                 => $texto,
        'img_descripcion'       => $img_descripcion,
        'img'                   => $nombreImg,
    ]);

    if(
        isset($nombreImg) &&
        !empty($noticia->getImg()) &&
        file_exists(PATH_IMAGES . '/big-' . $noticia->getImg())
    ) {
        unlink(PATH_IMAGES . '/big-' . $noticia->getImg());
    }

    $_SESSION['mensaje_exito'] = "La noticia '<b>" . $titulo . "</b>' fue editada con éxito.";

    header("Location: ./../index.php?s=blog");
    exit;
} catch(Exception $e) {
    $_SESSION['mensaje_error'] = "Ocurrió un error inesperado al tratar de grabar la información, la noticia no pudo ser publicada. Por favor, probá de nuevo más tarde.";
    $_SESSION['data_form'] = $_POST;

    header("Location: ./../index.php?s=noticia-editar&id=" . $noticia_id);
    exit;
}

