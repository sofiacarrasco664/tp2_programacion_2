<?php

namespace DaVinci\Modelos;

use DaVinci\DataBase\DBConexion;
use PDO;

class Producto
{
    protected int $producto_id;
    protected string $nombre;
    protected string $descripcion;
    protected string $img;
    protected string $img_descripcion;
    protected float $precio;




    /**@return self[]  La lista de noticias. */
    public function productosTodo(): array
    {
        $db = (new DBConexion())->getConexion();
        $query = "SELECT * FROM productos";

        $stmt = $db->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     * @return self|null
     */
    public function productosTraerPorId(int $id): ?self
    {
        $db = (new DBConexion())->getConexion();
        $query = "SELECT * FROM productos
                WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $stmt->fetch();
        if(!$producto) {
            return null;
        }

        return $producto;
    }






    /**
     * @return int
     */
    public function getProductoId(): int
    {
        return $this->producto_id;
    }

    /**
     * @param int $producto_id
     */
    public function setProductoId(int $producto_id): void
    {
        $this->producto_id = $producto_id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getImgDescripcion(): string
    {
        return $this->img_descripcion;
    }

    /**
     * @param string $img_descripcion
     */
    public function setImgDescripcion(string $img_descripcion): void
    {
        $this->img_descripcion = $img_descripcion;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }



}


    