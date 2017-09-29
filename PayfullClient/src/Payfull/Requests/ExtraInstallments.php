<?php
namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Responses\Responses;


class ExtraInstallments extends Request {

    const type = 'Get';
    const getParam = 'ExtraInstallmentsList';

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