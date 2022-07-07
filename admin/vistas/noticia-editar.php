<?php
use DaVinci\Session\Session;
use DaVinci\Modelos\Noticia;


$errores = (new Session)->flash('errores', []);
$dataForm = (new Session)->flash('data_form', []);

$noticia = (new Noticia())->noticiasTraerPorId($_GET['id']);
?>
<section id="editar-noticia">
    <h2>Edita tu Noticia</h2>
    <p>Editá los datos del formulario con los de la noticia.</p>
    <p> Cuando estés conforme dale a "Actualizar".</p>

    <form action="acciones/noticia-editar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $noticia->getNoticiaId();?>">
        <div>
            <label for="titulo">Título</label>
            <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    value="<?= $dataForm['titulo'] ?? $noticia->getTitulo();?>"
                    aria-describedby="<?= isset($errores['titulo']) ? 'error-titulo' : ''?> help-titulo"
            >
            <div id="help-titulo">El título tiene que tener al menos 5 caracteres</div>
            <?php
            if(isset($errores['titulo'])):
                ?>
                <div id="error-titulo"><span class="visually-hidden">Error: </span><?= $errores['titulo'];?></div>
            <?php
            endif;
            ?>
        </div>
        <div>
            <label for="sinopsis">Sinopsis</label>
            <textarea
                    id="sinopsis"
                    name="sinopsis"
                <?php if(isset($errores['sinopsis'])): ?> aria-describedby="error-sinopsis" <?php endif; ?>
            ><?= $dataForm['sinopsis'] ?? $noticia->getSinopsis();?></textarea>
            <?php
            if(isset($errores['sinopsis'])):
                ?>
                <div id="error-sinopsis"><span class="visually-hidden">Error: </span><?= $errores['sinopsis'];?></div>
            <?php
            endif;
            ?>
        </div>
        <div>
            <label for="texto">Texto completo</label>
            <textarea
                    id="texto"
                    name="texto"
                <?php if(isset($errores['texto'])): ?> aria-describedby="error-texto" <?php endif; ?>
            ><?= $dataForm['texto'] ?? $noticia->getTexto();?></textarea>
            <?php
            if(isset($errores['texto'])):
                ?>
                <div id="error-texto"><span class="visually-hidden">Error: </span><?= $errores['texto'];?></div>
            <?php
            endif;
            ?>
        </div>
        <?php
        if(!empty($noticia->getImg()) && file_exists(PATH_IMAGES . '/big-' . $noticia->getImg())):
            ?>
            <div>
                <p>Imagen Actual</p>
                <img src="<?= '../img/min-' . $noticia->getImg();?>" alt="">
            </div>
        <?php
        endif;
        ?>
        <div>
            <label for="img">Imagen <span>(<span class="visually-hidden">campo </span>opcional)</span></label>
            <input type="file" id="img" name="img">
        </div>
        <div>
            <label for="img_descripcion">Descripción de la Imagen <span>(<span class="visually-hidden">campo </span>opcional)</span></label>
            <input
                    type="text"
                    id="img_descripcion"
                    name="img_descripcion"
                    value="<?= $dataForm['img_descripcion'] ?? $noticia->getImgDescripcion();?>"
            >
        </div>
        <button type="submit">Actualizar</button>
    </form>
</section>


