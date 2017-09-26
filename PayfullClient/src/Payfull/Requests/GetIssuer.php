<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;

class GetIssuer extends Requests
{
    const getParam = 'Issuer';
    private $bin;
    const type = 'Get';

    public function __construct(Config $config) {
        parent::__construct($config);
    }

    public function setBin($bin)
    {
        Validate::bin($bin);
        $this->bin = $bin;
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

    protected function createRequest()
    {
        parent::createRequest();
        $this->params['get_param']  = self::getParam;
        $this->params['bin']        = $this->bin;
        $this->params['type']       = self::type;
        $this->params['hash']       = self::generateHash($this->params,$this->password);
    }
}