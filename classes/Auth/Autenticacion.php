<?php

namespace DaVinci\Auth;

use DaVinci\Modelos\Usuario;

class Autenticacion
{
    public function iniciarSesion(string $email, string $password): bool
    {
        $usuario = (new Usuario())->traerPorEmail($email);
        if(!$usuario) {
            return false;
        }

        if(!password_verify($password, $usuario->getPassword())){
            return false;
        }

        $this->autenticar($usuario);
        return true;
    }

    public function autenticar(Usuario $usuario) {
        $_SESSION['usuario_id'] = $usuario->getUsuarioId();
    }

    public  function cerrarSesion() {
        unset($_SESSION['usuario_id']);
    }

    public function estaAutenticado(): bool
    {
        return isset($_SESSION['usuario_id']);
    }

    public function getUsuarioId(): ?int
    {
        return $this->estaAutenticado() ?
            $_SESSION['usuario_id'] :
            null;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->estaAutenticado() ?
            (new Usuario())->usuariosTraerPorId($_SESSION['usuario_id']) :
            null;
    }
}