<?php

use DaVinci\Modelos\Noticia;

$noticia = (new Noticia())->noticiasTraerPorId($_GET['id']);

?>

<section id="detalle-noticia">
    <article>
        <div>
            <h2><?= $noticia->getTitulo();?></h2>
            <p><?= $noticia->getSinopsis();?></p>
            <p><?= $noticia->getTexto();?></p>
        </div>
        <picture>
            <img src="<?= 'img/big-' . $noticia->getImg();?>" alt="<?= $noticia->getImgDescripcion();?>">
        </picture>
    </article>
</section>