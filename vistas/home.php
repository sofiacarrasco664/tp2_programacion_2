<?php

use DaVinci\Modelos\Noticia;
use DaVinci\Modelos\Producto;

$noticias = (new Noticia())->noticiasTodo();
$productos = (new Producto())->productosTodo();
?>
  <section id="home">
  <h2>Todo para tu mascota</h2>
  <img src="img/perro_con_sombrero_dibujado.png" alt="Perro chiquito con un sombrero dibujado">
  </section>

<ul>
    <li>
        <section id="sobre-nosotros">
            <div>
                <p>Icono de Patita de Perro</p>
                <h3>Sobre Nosotros</h3>
                <p>

                    <strong>
                        Somos una de las principales nuevas empresas de <span lang="en">snacks</span> y accesorios para mascotas en Argentina.
                    </strong>
                    <em>
                        Fundados en el año 2015 teniendo como principal y único canal de venta directa <span lang="en">Walmart</span> Argentina que se extiende a lo largo de todo el territorio  nacional.
                    </em>
                </p>
                <p>
                    <strong>
                        Constantemente estamos en  búsqueda de productos atractivos e innovadores para consentir y regalonear a tu mascota a un precio conveniente y accesible.
                    </strong>
                    <em>
                        Contamos con un capital humano altamente capacitado para atender todas las necesidades del exigente mercado actual, distribuidos en las áreas comercial, administrativa y operacional. También contamos con una empresa de transportes propia para cubrir la logística de la cadena de distribución.
                    </em>
                </p>
            </div>

            <img src="img/chica_con_perritos.jpg" alt="">

        </section>
    </li>
    <li>
        <section id="ultimas-noticias">

            <img src="img/perrito_leon.png" alt="Perro con fondo celeste, con dibujos">

            <div>
                <p>Icono de Patita de Perro</p>
                <h3>Nuestro Blog</h3>
                <p>En Mascotitas tenemos una sección especial para los dueños curiosos, que buscan mejorar constantemente la calidad de vida de sus amiguitos peludos, aprendiendo más sobre ellos y sobre cómo hacerlos mas felices.</p>
                <p>
                    ¿Quieres ver las ultimas noticias de nuestra comunidad? Explora nuestro blog para que puedas enterarte de todas las novedades, tips y anecdotas curiosas de nuestro equipo y nuestra comunidad.
                </p>
                <a href="index.php?s=blog">Ver Más</a>
            </div>

        </section>
    </li>
    <li>
        <section id="contactanos">
            <article>
                <div>
                    <p>Icono de Patita de Perro</p>
                    <h3>¿Quieres ver todas nuestras novedades?</h3>
                    <p>
                        Si queres conocer todas las novedades de nuestro sitio, los nuevos productos o las nuevas noticias.
                        Llena nuestro formulario y en la brevedad nos pondremos en contacto con vos para darte información o suscribirte a nuestro <span lang="en">newsletter</span>
                    </p>
                    <a href="index.php?s=contacto">¡Contactanos!</a>
                </div>
                <img src="img/perro_con_antifaz.png" alt="Perro con antifaz rosado">
            </article>
        </section>
    </li>

</ul>

