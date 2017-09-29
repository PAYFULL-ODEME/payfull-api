<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;

class Cancel extends Request {

    const type = 'Cancel';
    private $transactionId;
    private $passiveData;

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function setPassiveData($passiveData)
    {
        Validate::passiveData($passiveData);
        $this->passiveData = $passiveData;
    }

    public function setTransactionId($transactionId)
    {
        Validate::transactionId($transactionId);
        $this->transactionId = $transactionId;
    }

    protected function createRequest() {
        parent::createRequest();
        $this->params['type']               = self::type;
        $this->params['passive_data']       = $this->passiveData;
        $this->params['transaction_id']     = $this->transactionId;
        $this->params['hash']       = self::generateHash($this->params,$this->password);
    }

    public function execute(){
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }
}