<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Validate;
use Payfull\Responses\Responses;
use Payfull\Models\Customer;

class SaleWithSavedCard extends Sale {

    private $token;

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function setCustomerInfo(Customer $customerInfo)
    {
        $this->params['customer_firstname'] = $customerInfo->getName();
        $this->params['customer_lastname']  = $customerInfo->getSurname();
        $this->params['customer_email']     = $customerInfo->getEmail();
        $this->params['customer_phone']     = $customerInfo->getPhoneNumber();
        $this->params['customer_tc']        = $customerInfo->getTcNumber();
    }


    public function setToken($token)
    {
        Validate::token($token);
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    protected function createRequest() {
        parent::createRequest();
        $this->params['type']               = self::type;
        $this->params['payment_title']      = $this->getPaymentTitle();
        $this->params['passive_data']       = $this->getPassiveData();
        $this->params['currency']           = $this->getCurrency();
        $this->params['total']              = $this->getTotal();
        $this->params['installments']       = $this->getInstallment();
        $this->params['bank_id']            = $this->getBankId();
        $this->params['gateway']            = $this->getGateway();
        $this->params['cc_token']           = $this->token;
        $this->params['hash']               = self::generateHash($this->params,$this->password);
    }

    public function execute(){
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }
}