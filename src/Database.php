<?php

namespace Src;

class Database
{
    private $connection;
    private static $_instance;

    private function __construct()
    {
        try {
            $this->connection = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            dump("Failed to connect to DB: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __clone()
    {
        # Magic method clone is empty to prevent duplication of connection
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
