<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Responses\Responses;


class Installments extends Request {

    const TYPE = 'Get';
    const GETPARAM = 'Installments';

    public function __construct(Config $config)
    {
        parent::__construct($config, self::TYPE);
    }

    protected function createRequest()
    {
        $this->params['get_param']  = self::GETPARAM;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}