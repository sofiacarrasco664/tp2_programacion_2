<?php

$password = 'nuevapassword';

echo "El password a hashear es: " . $password . "<br>";

$hashPass = password_hash($password, PASSWORD_DEFAULT);

echo "Hash password_hash: " . $hashPass . "<br>";