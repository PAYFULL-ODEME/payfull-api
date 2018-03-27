<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Errors;

class Request
{
    protected $merchant;
    protected $language = 'tr';
    protected $clientIp;
    protected $password;
    protected $endpoint;
    protected $params;
    protected $type;
    protected $merchantTrxId;

    protected function __construct(Config $config , $type)
    {
        $this->params['type'] = $type;
        $this->merchant = $config->getApiKey();
        $this->clientIp = self::getClientIp();
        $this->password = $config->getApiSecret();
        $this->endpoint = $config->getApiUrl();
    }

    protected static function getClientIp()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    protected static function generateHash($params,$password)
    {
        ksort($params);
        $hashString = "";
        foreach ($params as $key=>$val) {
            $l = mb_strlen($val);
            if($l) $hashString .= $l . $val;
        }
        return hash_hmac("sha1", $hashString, $password);
    }

    protected static function send($endpoint, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        $response = curl_exec($ch);

        if($response == false) {
            Errors::throwError('RESPONSE_IS_FALSE');
        }

        return $response;
    }

    protected function createRequest()
    {
        $this->params['merchant']  = $this->merchant;
        $this->params['language']  = $this->language;
        $this->params['client_ip'] = $this->clientIp;
        $this->params['hash']      = self::generateHash($this->params,$this->password);
    }


}