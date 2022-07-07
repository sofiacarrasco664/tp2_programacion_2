<?php

use DaVinci\Modelos\Producto;

$noticia = (new Producto())->productosTraerPorId($_GET['id']);

?>

<section id="detalle-producto">
    <picture>
        <source media="all and (min-width: 400px)" srcset="">
        <img src="<?= 'img/big-' . $noticia->getImg();?>" alt="<?= $noticia->getImgDescripcion();?>">
    </picture>
    <div>
        <h2><?= $noticia->getNombre();?></h2>
        <p><?= $noticia->getDescripcion();?></p>
        <p id="producto-precio">$<?= $noticia->getPrecio();?></p>
    </div>



</section>