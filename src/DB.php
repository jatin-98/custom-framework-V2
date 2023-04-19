<?php

namespace Src;

use Exception;

class DB
{
    protected static $pdo;
    protected static $connection;
    protected static $fetch = \PDO::FETCH_ASSOC;
    protected static $data = [];

    public function __construct()
    {
        try {
            self::connect();
        } catch (Exception $e) {
            dump("Failed to connect to DB: " . $e->getMessage());
        }
    }

    protected function connect()
    {
        self::$pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);

        /* if (self::$pdo === null) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE;
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];
            self::$pdo = new \PDO($dsn, DB_USER, DB_PASS, $options);
        } */
    }

    public function __sleep()
    {
        return array('connection');
    }

    public function __wakeup()
    {
        self::connect();
    }

    public static function check()
    {
        return self::$connection;
    }

    public static function query($query, $fetch = null)
    {
        new self();      
        $stmt = self::$pdo->prepare($query);       
        $stmt->execute(self::$data);

        if ($fetch === null) return true;

        return debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'] === 'singleRecord' ? $stmt->fetch($fetch) : $stmt->fetchAll($fetch);
    }

    public static function allRecords($query)
    {
        return self::query($query, self::$fetch);
    }

    public static function singleRecord($query)
    {
        self::$fetch = \PDO::FETCH_ORI_FIRST;
        return self::query($query, self::$fetch);
    }

    public static function data(array $data)
    {
        self::$data = $data;
        return new self;
    }
}
