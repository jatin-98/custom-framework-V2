<?php

namespace Src;

class Request
{
    protected static $request = [];

    public static function only(array $onlyKeys)
    {
        self::$request = array_merge($_GET, $_POST, $_FILES);
        $filteredArray = array_filter(self::$request, function ($v) use ($onlyKeys) {
            return in_array($v, $onlyKeys);
        }, ARRAY_FILTER_USE_KEY);

        return $filteredArray;
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
