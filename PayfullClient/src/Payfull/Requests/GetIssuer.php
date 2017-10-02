<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;

class GetIssuer extends Request
{
    const TYPE = 'Get';
    const GETPARAM = 'Issuer';
    private $bin;

    public function __construct(Config $config)
    {
        parent::__construct($config, self::TYPE);
    }

    public function setBin($bin)
    {
        Validate::bin($bin);
        $this->bin = $bin;
    }

    protected function createRequest()
    {
        $this->params['get_param']  = self::GETPARAM;
        $this->params['bin']        = $this->bin;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }
}