<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;

class Cancel extends Request {

    const TYPE = 'Cancel';
    private $transactionId;
    private $passiveData;

    public function __construct(Config $config)
    {
        parent::__construct($config, self::TYPE);
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

    public function setMerchantTrxId($merchant_trx_id)
    {
        Validate::transactionId($merchant_trx_id);
        $this->merchantTrxId;
    }

    protected function createRequest()
    {
        $this->params['passive_data']       = $this->passiveData;
        $this->params['transaction_id']     = $this->transactionId;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }
}