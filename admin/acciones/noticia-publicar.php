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

$titulo             = $_POST['titulo'];
$sinopsis           = $_POST['sinopsis'];
$texto              = $_POST['texto'];
$img_descripcion    = $_POST['img_descripcion'];
$img                = $_FILES['img'];


$validador = new NoticiaValidar([
   'titulo'             => $titulo,
   'sinopsis'           => $sinopsis,
   'texto'              => $texto,
   'img'                => $img,
   'img_descripcion'    => $img_descripcion,
]);

if ($validador->hayErrores()) {
    $_SESSION['errores'] = $validador->getErrores();
    $_SESSION['data_form'] = $_POST;

    header("Location: ./../index.php?s=nueva-noticia");

    exit;
}

echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "<pre>";

if(!empty($img['tmp_name'])) {
    $nombreImg = date('YmdHis_') . slugify($img['name']);
    move_uploaded_file($img['tmp_name'], PATH_IMAGES . '/big-' . $nombreImg);
}

try {
    (new Noticia())->crear([
        'usuarios_usuario_id'   => $autenticacion->getUsuarioId(),
        'fecha_publicacion'     => date('Y-m-d H:i:s'),
        'titulo'                => $titulo,
        'sinopsis'              => $sinopsis,
        'texto'                 => $texto,
        'img'                   => $nombreImg,
        'img_descripcion'       => $img_descripcion,
    ]);

    $_SESSION['mensaje_exito'] = "La noticia <b>'" . $titulo . "'</b> fue publicada con éxito";

   header("Location: ./../index.php?s=blog");
    exit;
} catch(\Exception $e) {
    $_SESSION['mensaje_error'] = "Ocurrió un error inesperado al tratar de grabar la información, la noticia no pudo ser publicada. Por favor, probá de nuevo más tarde." . $e->getMessage();
    $_SESSION['data_form'] = $_POST;
    header("Location: ./../index.php?s=nueva-noticia");
    exit;
}
