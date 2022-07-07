<section id="banner-contacto">
    <h2>¡Contactanos!</h2>
    <img src="img/bull_dog_con_traje_de_unicornio.jpg" alt="Perrito Bull Dog con traje de unicornio">
</section>
<section id="contacto">
    <h3>¿Quieres saber más sobre nosotros?</h3>
    <p>
        Contactanos para conocer más sobre nuestros productos.
    </p>
    <form action="vistas/form.php" method="POST">
        <div>
            <label for="nombreID">Nombre <span>Requerido</span></label>
            <input type="text" name="nombre" id="nombreID" placeholder="Ingrese su nombre" required>
        </div>
        <div>
            <label for="apellido">Apellido <span>Requerido</span></label>
            <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" required>
        </div>
        <div>
            <label for="e-mail">E-mail <span>Requerido</span></label>
            <input type="text" name="e-mail" id="e-mail" placeholder="usuario@mail.com" required>
        </div>
        <div>
            <label for="consulta">Dejanos tu consulta <span>Requerido</span></label>
            <textarea name="consulta" id="consulta" placeholder="Escribe tu consulta aquí" required></textarea>
        </div>
        <button type="submit">Enviar</button>
    </form>

</section>