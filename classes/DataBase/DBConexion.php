<?php

namespace DaVinci\DataBase;

use PDO;


/**
 * Clase para proveer la conexión de PDO al proyecto.
 */

class DBConexion
{
    public const DB_HOST = '127.0.0.1';
    public const DB_USER = 'root';
    public const DB_PASS = '';
    public const DB_BASE = 'prog2_2022_1';
    public const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_BASE . ';charset=utf8mb4';

    /** @var PDO */
    protected PDO $db;

    public function __construct() {

        try {
            $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            die('Error al conectar con MySQL.');
        }
    }

    /** @return PDO */

    public function getConexion() : PDO
    {
        return $this->db;
    }
}