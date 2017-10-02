<?php


namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;

class ReturnTransaction extends Request {

    const TYPE = 'Return';
    private $transactionId;
    private $passiveData;
    private $total;

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

    public function setTotal($total)
    {
        Validate::total($total);
        $this->total = $total;
    }

    protected function createRequest()
    {
        $this->params['passive_data']       = $this->passiveData;
        $this->params['transaction_id']     = $this->transactionId;
        $this->params['total']              = $this->total;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}