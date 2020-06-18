<?php

namespace Payfull\Responses;


class Responses
{
    public static function processResponse($response)
    {
        return json_decode($response,TRUE);
    }

    public static function process3DResponse($response)
    {
        if(strpos($response, '<form') !== False OR strpos($response, '<html') !== False)
        {
            echo $response;
            exit;
        } else {
            return self::processResponse($response);
        }
    }
}
