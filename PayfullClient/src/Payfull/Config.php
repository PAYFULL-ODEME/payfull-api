<?php

namespace Payfull;

class Config
{
    private $apiKey;
    private $apiSecret;
    private $apiUrl;

    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    public function getApiSecret()
    {
        return $this->apiSecret;
    }
}