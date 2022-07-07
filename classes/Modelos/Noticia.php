<?php

namespace DaVinci\Modelos;

use DaVinci\DataBase\DBConexion;
use PDO;
use PDOException;

    class Noticia
    {
        protected int $noticia_id;
        protected int $usuarios_usuario_id;
        protected string $fecha_publicacion;
        protected string $titulo;
        protected string $texto;
        protected string $sinopsis;
        protected ?string $img;
        protected ?string $img_descripcion;


        /**@return self[]  La lista de noticias. */
        public function noticiasTodo(): array
        {
            $db = (new DBConexion())->getConexion();
            $query = "SELECT * FROM noticias";

            $stmt = $db->prepare($query);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
            return $stmt->fetchAll();
        }

        /**
         * @param int $id
         * @return self|null
         */
        public function noticiasTraerPorId(int $id): ?self
        {
            $db = (new DBConexion())->getConexion();
            $query = "SELECT * FROM noticias 
                    WHERE noticia_id = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
            $noticia = $stmt->fetch();
            if (!$noticia) {
                return null;
            }

            return $noticia;
        }

        /**
         * Crea una noticia en la base de datos.
         *
         * @param array $data
         * @return void
         * @throws PDOException
         */
        public function crear(array $data)
        {
            $db = (new DBConexion())->getConexion();
            $query = "INSERT INTO noticias (usuarios_usuario_id, fecha_publicacion ,titulo ,sinopsis, 
                      texto, img, img_descripcion)
            VALUES (:usuarios_usuario_id, :fecha_publicacion, :titulo, :sinopsis, :texto, :img, :img_descripcion)";

            $stmt = $db->prepare($query);
            $stmt->execute([
               'usuarios_usuario_id'    => $data['usuarios_usuario_id'],
               'fecha_publicacion'      => $data['fecha_publicacion'],
               'titulo'                 => $data['titulo'],
               'sinopsis'               => $data['sinopsis'],
               'texto'                  => $data['texto'],
               'img'                    => $data['img'],
               'img_descripcion'        => $data['img_descripcion'],

            ]);

        }

        /**
         * Actualizar la noticia.
         *
         * @param array $data
         * @return void
         * @throws PDOException
         */
        public function editar(array $data): void
        {
            $db = (new DBConexion())->getConexion();
            $query = "UPDATE noticias
                SET usuarios_usuario_id             = :usuarios_usuario_id,
                    titulo                          = :titulo,
                    sinopsis                        = :sinopsis,
                    texto                           = :texto,
                    img                             = :img,
                    img_descripcion                 = :img_descripcion
                WHERE noticia_id                    = :noticia_id";
            $db->prepare($query)->execute([
                'noticia_id'            => $this->getNoticiaId(),
                'usuarios_usuario_id'   => $data['usuarios_usuario_id'],
                'titulo'                => $data['titulo'],
                'sinopsis'              => $data['sinopsis'],
                'texto'                 => $data['texto'],
                'img'                   => $data['img'],
                'img_descripcion'       => $data['img_descripcion'],
            ]);
        }


        /**
         * Eliminar la noticia
         * @throws PDOException
         */

        public function eliminar(): void
        {
            $db = (new DBConexion())->getConexion();
            $query =    "DELETE FROM noticias
                        WHERE noticia_id = ?";
            $db->prepare($query)->execute([$this->getNoticiaId()]);
        }

    // Setters y Getters


        /**
         * @return int
         */
        public function getNoticiaId(): int
        {
            return $this->noticia_id;
        }

        /**
         * @param int $noticia_id
         */
        public function setNoticiaId(int $noticia_id): void
        {
            $this->noticia_id = $noticia_id;
        }

        /**
         * @return int
         */
        public function getUsuariosUsuarioId(): int
        {
            return $this->usuarios_usuario_id;
        }

        /**
         * @param int $usuarios_usuario_id
         */
        public function setUsuariosUsuarioId(int $usuarios_usuario_id): void
        {
            $this->usuarios_usuario_id = $usuarios_usuario_id;
        }

        /**
         * @return string
         */
        public function getFechaPublicacion(): string
        {
            return $this->fecha_publicacion;
        }

        /**
         * @param string $fecha_publicacion
         */
        public function setFechaPublicacion(string $fecha_publicacion): void
        {
            $this->fecha_publicacion = $fecha_publicacion;
        }

        /**
         * @return string
         */
        public function getTitulo(): string
        {
            return $this->titulo;
        }

        /**
         * @param string $titulo
         */
        public function setTitulo(string $titulo): void
        {
            $this->titulo = $titulo;
        }

        /**
         * @return string
         */
        public function getTexto(): string
        {
            return $this->texto;
        }

        /**
         * @param string $texto
         */
        public function setTexto(string $texto): void
        {
            $this->texto = $texto;
        }

        /**
         * @return string
         */
        public function getSinopsis(): string
        {
            return $this->sinopsis;
        }

        /**
         * @param string $sinopsis
         */
        public function setSinopsis(string $sinopsis): void
        {
            $this->sinopsis = $sinopsis;
        }

        /**
         * @return string|null
         */
        public function getImg(): ?string
        {
            return $this->img;
        }

        /**
         * @param string|null $img
         */
        public function setImg(?string $img): void
        {
            $this->img = $img;
        }

        /**
         * @return string|null
         */
        public function getImgDescripcion(): ?string
        {
            return $this->img_descripcion;
        }

        /**
         * @param string|null $img_descripcion
         */
        public function setImgDescripcion(?string $img_descripcion): void
        {
            $this->img_descripcion = $img_descripcion;
        }


    }