<?php

use DaVinci\Modelos\Noticia;

    $noticias = (new Noticia())->noticiasTodo();
?>

<section id="blog">
<h2>Aprende sobre tu mascota</h2>
  <img src="img/gato_marron_con_manchas.jpg" alt="Gato marron con manchas claritas, mirando de costado">
  </section>

<section id="detalle-noticias">
<h3>Todas las Noticias</h3>

    <?php
    foreach($noticias as $noticia):
    ?>

    <div class="card-noticias">
      <article>
          <img src="<?= 'img/min-' . $noticia->getImg();?>" alt="<?=$noticia->getImgDescripcion();?>">
          <h4><?=$noticia->getTitulo();?></h4>
          <p><?=$noticia->getSinopsis();?></p>
          <a href="index.php?s=detalle_blog&id=<?=$noticia->getNoticiaId();?>">Ver más</a>
      </article>
    </div>

    <?php
    endforeach;
    ?>

</section>