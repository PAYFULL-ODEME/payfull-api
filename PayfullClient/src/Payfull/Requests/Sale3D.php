<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Models\CustomerInfo;
use Payfull\Models\PaymentCard;
use Payfull\Validate;
use Payfull\Responses\Responses;

class Sale3D extends Request
{
    const type = 'Sale';
    const has3d = '1';
    private $paymentTitle;
    private $passiveData;
    private $currency;
    private $total;
    private $installment;
    private $bankId;
    private $gateway;
    private $returnUrl;

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function setPaymentCard(PaymentCard $paymentCard){
        $this->params['cc_name']    = $paymentCard->getCardHolderName();
        $this->params['cc_number']  = $paymentCard->getCardNumber();
        $this->params['cc_month']   = $paymentCard->getExpireMonth();
        $this->params['cc_year']    = $paymentCard->getExpireYear();
        $this->params['cc_cvc']     = $paymentCard->getCvc();
    }

    public function setCustomerInfo(CustomerInfo $customerInfo)
    {
        $this->params['customer_firstname'] = $customerInfo->getName();
        $this->params['customer_lastname']  = $customerInfo->getSurname();
        $this->params['customer_email']     = $customerInfo->getEmail();
        $this->params['customer_phone']     = $customerInfo->getPhoneNumber();
        $this->params['customer_tc']        = $customerInfo->getTcNumber();
    }

    public function setCurrency($currency)
    {
        Validate::currency($currency);
        $this->currency = $currency;
    }

    public function setTotal($total)
    {
        Validate::total($total);
        $this->total = $total;
    }

    public function setPaymentTitle($paymentTitle)
    {
        Validate::paymentTitle($paymentTitle);
        $this->paymentTitle = $paymentTitle;
    }

    public function setPassiveData($passiveData)
    {
        Validate::passiveData($passiveData);
        $this->passiveData = $passiveData;
    }

    public function setInstallment($installment)
    {
        Validate::installment($installment);
        $this->installment = $installment;
    }

    public function setBankId($bankId)
    {
        Validate::bankId($bankId);
        $this->bankId = $bankId;
    }

    public function setGateway($gateway)
    {
        Validate::gateway($gateway);
        $this->gateway = $gateway;
    }

    public function setReturnUrl($returnUrl)
    {
        Validate::returnUrl($returnUrl);
        $this->returnUrl = $returnUrl;
    }

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    protected function createRequest() {
        parent::createRequest();
        $this->params['type']               = self::type;
        $this->params['payment_title']      = $this->paymentTitle;
        $this->params['passive_data']       = $this->passiveData;
        $this->params['currency']           = $this->currency;
        $this->params['total']              = $this->total;
        $this->params['installments']       = $this->installment;
        $this->params['bank_id']            = $this->bankId;
        $this->params['gateway']            = $this->gateway;
        $this->params['has3d']              = self::has3d;
        $this->params['return_url']         = $this->returnUrl;
        $this->params['hash']       = self::generateHash($this->params,$this->password);

    }

    public function execute(){
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}