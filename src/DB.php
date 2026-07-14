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

    protected static function connect()
    {
        if (self::$pdo === null) {
            self::$pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        }
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

    public static function query($query, $fetch = null, $data = [])
    {
        self::connect();
        $stmt = self::$pdo->prepare($query);       
        $executeData = !empty($data) ? $data : self::$data;
        $stmt->execute($executeData);
        self::$data = [];

        if ($fetch === null) return true;

        if ($fetch === 'single') {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
        
        return $stmt->fetchAll($fetch);
    }

    public static function allRecords($query, $data = [])
    {
        return self::query($query, \PDO::FETCH_ASSOC, $data);
    }

    public static function singleRecord($query, $data = [])
    {
        return self::query($query, 'single', $data);
    }

    public static function data(array $data)
    {
        self::$data = $data;
        return new self;
    }
}
