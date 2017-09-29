<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Responses\Responses;


class Installments extends Request {

    const type = 'Get';
    const getParam = 'Installments';

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    protected function createRequest() {
        parent::createRequest();
        $this->params['type']       = self::type;
        $this->params['get_param']  = self::getParam;
        $this->params['hash']       = self::generateHash($this->params,$this->password);
    }

    public function execute(){
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}