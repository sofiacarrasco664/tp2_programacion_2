<?php
use DaVinci\Session\Session;


$errores = (new Session())->flash('errores', []);
$dataForm = (new Session())->flash('data_form', []);
?>

<section id="nueva-noticia">
    <h2>Crea tu noticia</h2>
    <p>
        <strong>
            Completa los datos del formulario con los de la noticia.
        </strong>
        <em>
            Cuando este conforme haga click al botón "Publicar".
        </em>
    </p>
    <form action="acciones/noticia-publicar.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="titulo">Titulo</label>

            <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    value="<?= $dataForm['titulo'] ?? null;?>"
                    placeholder="Ingresa un titulo"
                    <?php if(isset($errores['titulo'])): ?> aria-describedby="error-titulo" <?php endif; ?>
            >
            <div id="help-titulo">El título tiene que tener al menos 5 caracteres</div>
            <?php
            if(isset($errores['titulo'])):
            ?>
            <div id="error-titulo"><span class="visually-hidden">Error:</span><?= $errores['titulo'];?></div>
            <?php
            endif;
            ?>
        </div>
        <div>
            <label for="sinopsis">Sinopsis</label>
            <textarea
                    name="sinopsis"
                    id="sinopsis"
                    placeholder="Escribe tu sinopsis"
                    <?php if(isset($errores['sinopsis'])): ?> aria-describedby="error-sinopsis" <?php endif; ?>
            ><?= $dataForm['sinopsis'] ?? null;?></textarea>
            <?php
            if(isset($errores['sinopsis'])):
                ?>
                <div id="error-sinopsis"><span class="visually-hidden">Error:</span><?= $errores['sinopsis'];?></div>
            <?php
            endif;
            ?>
        </div>
        <div>
            <label for="texto">Texto Completo</label>
            <textarea
                    name="texto"
                    id="texto"
                    placeholder="Escribe el texto de tu noticia"
                    <?php if(isset($errores['texto'])): ?> aria-describedby="error-texto" <?php endif; ?>
            ><?= $dataForm['texto'] ?? null;?></textarea>
            <?php
            if(isset($errores['texto'])):
                ?>
                <div id="error-texto"><span class="visually-hidden">Error:</span><?= $errores['texto'];?></div>
            <?php
            endif;
            ?>
        </div>
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
                    placeholder="Breve descripción de la imagen"
                    value="<?= $dataForm['img_descripcion'] ?? null;?>"
            >
        </div>
        <button type="submit">Publicar</button>
    </form>

</section>
