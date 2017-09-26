<?php

namespace Payfull\Responses;


class Responses
{
    public static function processResponse($response)
    {
        return json_decode($response,TRUE);
    }
}