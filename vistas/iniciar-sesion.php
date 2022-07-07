<?php
$dataForm = $_SESSION['data_form'] ?? [];
unset($_SESSION['data_form']);



?>

<section id="banner-inicio-sesion">
    <h2>
        Inicia Sesión
    </h2>
    <img src="img/perro_con_anteojos_playeros.jpg" alt="Perrito blanco con manchas con anteojos playeros, chupandose la cara">
</section>
<section id="iniciar-sesion">
    <h3>Ingresa a nuestro panel</h3>
    <p>
        Para acceder al panel, tenes que iniciar sesión con un usuario administrador, ingresá tus credenciales de acceso para proseguir.
    </p>
    <form action="admin/acciones/auth-iniciar-sesion.php" method="post">
        <div>
            <label for="email">Email</label>
            <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="usuario@mail.com"
                    value="<?= $dataForm['email '] ?? null;?>"
            >
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="*******">
        </div>
        <button type="submit">Ingresar</button>
    </form>
</section>
