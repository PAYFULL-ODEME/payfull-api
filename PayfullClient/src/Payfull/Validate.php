<?php

namespace Payfull;

class Validate
{
    public static function bin($bin)
    {
       if(strlen($bin) == 6) {
           return true;
       } else {
           Errors::throwError('WRONG_BIN_LENGTH');
       }
    }
}