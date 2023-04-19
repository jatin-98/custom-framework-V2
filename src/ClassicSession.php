<?php

namespace Src;

class ClassicSession
{

    protected static $isStarted = false;

    public static function start(): bool
    {
        if (self::$isStarted)  return true;

        if (\PHP_SESSION_ACTIVE === session_status()) : self::$isStarted = true;
            return true;
        endif;

        session_start();
        return true;
    }

    public static function set(string $key,  $value): void
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get(string $key)
    {
        self::start();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function remove(string $key): void
    {
        self::start();
        if (isset($_SESSION[$key])) unset($_SESSION[$key]);
    }

    public static function clear(): void
    {
        self::start();
        $_SESSION = [];
    }
}
