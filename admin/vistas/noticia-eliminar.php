<?php
use DaVinci\Modelos\Noticia;

$noticia = (new Noticia())->noticiasTraerPorId($_GET['id']);


?>

<section id="eliminar-noticia">
    <h2>¿Quieres eliminar esta noticia?</h2>
    <p>Si eliminas esta noticia, no podrás recuperarla más adelante.</p>
    <dl>
        <dt>Fecha de publicación</dt>
        <dd><?= $noticia->getFechaPublicacion();?></dd>
        <dt>Titulo</dt>
        <dd><?= $noticia->getTitulo();?></dd>
        <dt>Sinopsis</dt>
        <dd><?= $noticia->getSinopsis();?></dd>
        <dt>Texto</dt>
        <dd><?= $noticia->getTexto();?></dd>
        <dt>Imagen</dt>
        <dd><img src="<?='../img/min-' . $noticia->getImg(); ?>" alt="<?= $noticia->getImgDescripcion();?>"></dd>
        <dt>Descripción de la Imagen</dt>
        <dd><?= $noticia->getImgDescripcion();?></dd>
    </dl>

    <form action="acciones/noticia-eliminar.php" method="post">
        <input type="hidden" name="id" value="<?= $noticia->getNoticiaId();?>">
        <button type="submit">Eliminar</button>
    </form>
</section>
