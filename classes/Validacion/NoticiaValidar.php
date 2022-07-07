<?php

namespace DaVinci\Validacion;

class NoticiaValidar
{
    /** @var array */
    protected $data = [];

    /** @var array */
    protected $errores = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->validar();
    }

    public function hayErrores(): bool
    {
        return count($this->errores) > 0;
    }

    /**
     * @return array
     */
    public function getErrores(): array
    {
        return $this->errores;
    }

    protected function validar()
    {
        if(empty($this->data['titulo'])) {
            $this->errores['titulo'] = "Tenes que escribir el titulo de la noticia";
        } else if (strlen($this->data['titulo']) < 5) {
            $this->errores['titulo'] = "Tenes que escribir al menos 5 caracteres para el titulo de la noticia";
        }

        if(empty($this->data['sinopsis'])) {
            $this->errores['sinopsis'] = "Tenes que escribir la sinopsis de la noticia";
        }

        if(empty($this->data['texto'])) {
            $this->errores['texto'] = "Tenes que escribir el texto de la noticia";
        }
    }
}