<?php

    use DaVinci\Modelos\Noticia;
    $noticias = (new Noticia())->noticiasTodo();

?>
<section id="tabla-noticias">
<h2>Administracion de Noticias</h2>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Fecha de publicación</th>
        <th>Título</th>
        <th>Sinopsis</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($noticias as $noticia) :
    ?>
    <tr>
        <td><?= $noticia->getNoticiaId();?></td>
        <td><?= $noticia->getFechaPublicacion();?></td>
        <td><?= $noticia->getTitulo();?></td>
        <td><?= $noticia->getSinopsis();?></td>
        <td><img src="<?= "../img/mini-" . $noticia->getImg();?>" alt="<?= $noticia->getImgDescripcion();?>"></td>
        <td>

            <a href="index.php?s=noticia-editar&id=<?= $noticia->getNoticiaId();?>" style="padding: 10px; width: 100%; margin: 10px">Editar</a>
            <a href="index.php?s=noticia-eliminar&id=<?= $noticia->getNoticiaId();?>" style="padding: 10px; width: 100%; margin: 10px">Eliminar</a>
        </td>

    </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>
<p>
   <a href="index.php?s=nueva-noticia">Crear nueva noticia</a>
</p>

</section>