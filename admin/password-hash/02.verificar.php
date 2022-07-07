<?php

$password = 'nuevapassword';

$storedHash = '$2y$10$o/VNURB2bbNxwLjzVphKeeVu9A1u.TV5a1SA7MPRsx/wi84FqlWa6';

echo "El password a verificar es: " . $password . "<br>";

echo "El hash bcrypt es: " . $storedHash . "<br>";

if(password_verify($password, $storedHash)) {
    echo "bcrypt: ¡El password es correcto, yay!<br>";
} else {
    echo "bcrypt: Error, el password no coincide.<br>";
}