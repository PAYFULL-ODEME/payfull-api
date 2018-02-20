<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;

class TransactionStatus extends Request
{
    const TYPE = 'Get';
    const GETPARAM = 'TransactionStatus';

    private $transactionId;
    private $passiveData;

    public function __construct(Config $config)
    {
        parent::__construct($config, self::TYPE);
    }

    public function setTransactionId($trx)
    {
        Validate::transactionId($trx);
        $this->transactionId = $trx;
    }

    public function setPassiveData($passiveData)
    {
        Validate::passiveData($passiveData);
        $this->passiveData = $passiveData;
    }

    protected function createRequest()
    {
        $this->params['get_param']       = self::GETPARAM;
        $this->params['transaction_id']  = $this->transactionId;
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