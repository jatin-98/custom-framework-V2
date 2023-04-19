<?php

namespace App\Models;

use Src\DB;

class CommonModel
{
    private const AES_KEY = AES_KEY;

    public static function encryptValue($val)
    {
        $encryptedValue = DB::data(['aes' => self::AES_KEY])->singleRecord("SELECT (HEX(AES_ENCRYPT('$val', ':aes'))) AS encrytVal");
        return $encryptedValue['encrytVal'];
    }

    public static function decryptValue($val)
    {
        $encryptedValue = DB::data(['aes' => self::AES_KEY])->singleRecord("SELECT (AES_DECRYPT(UNHEX('$val'), ':aes')) AS actualVal");
        return $encryptedValue['actualVal'];
    }
}
