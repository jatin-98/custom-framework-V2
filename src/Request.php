<?php

namespace Src;

class Request
{
    protected static $request = [];

    public static function only(array $onlyKeys)
    {
        self::$request = array_merge($_GET, $_POST, $_FILES);
        return array_intersect_key(self::$request, array_flip($onlyKeys));
    }

    public static function replaceKeys(array $replacingArray)
    {
        $array = static::only(array_keys($replacingArray));
        return array_combine(array_merge($array, $replacingArray), $array);
    }

    public static function merge(array $mainArray, array $extraFields)
    {
        return array_merge($mainArray, $extraFields);
    }
}
