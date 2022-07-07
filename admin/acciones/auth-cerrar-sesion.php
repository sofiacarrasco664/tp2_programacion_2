<?php

require_once __DIR__ . '/../../bootstrap/init.php';

use DaVinci\Auth\Autenticacion;

$autenticacion = new Autenticacion();

$autenticacion->cerrarSesion();

$_SESSION['mensaje_exito'] = "La sesión se cerró correctamente. ¡Te esperamos de vuelta!";
header("Location: ../index.php?s=iniciar-sesion");