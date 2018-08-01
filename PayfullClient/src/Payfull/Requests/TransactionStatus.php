<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;

class TransactionStatus extends Request
{
    const TYPE = 'Get';
    const GETPARAM = 'TransactionStatus';

    private $passiveData;

    public function __construct(Config $config)
    {
        parent::__construct($config, self::TYPE);
    }

    public function setMerchantTrxId($trx)
    {
        Validate::transactionId($trx);
        $this->merchantTrxId = $trx;
    }

    public function setPassiveData($passiveData)
    {
        Validate::passiveData($passiveData);
        $this->passiveData = $passiveData;
    }

    protected function createRequest()
    {
        $this->params['get_param']       = self::GETPARAM;
        $this->params['merchant_trx_id']  = $this->merchantTrxId;
        $this->params['passive_data']    = $this->passiveData;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }
}
