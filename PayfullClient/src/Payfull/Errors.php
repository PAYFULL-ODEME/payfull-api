<?php

namespace Payfull;

class Errors
{

    private static $errorArr = [
        "WRONG_BIN_LENGTH"               => "BIN değeri 6 karakterden oluşmalıdır. (setBin)",
        "RESPONSE_IS_FALSE"              => "Response değeri boş döndü. (setApiUrl)",
    ];

    public static function throwError($error)
    {
        throw new \Exception(self::$errorArr[$error]);
    }

}