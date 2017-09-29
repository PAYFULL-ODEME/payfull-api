<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Models\PaymentItem;
use Payfull\Models\RequestType;
use Payfull\Responses\Responses;
use Payfull\Validate;

class Payment extends Request {

    const type = 'Set';
    const set_param = 'Request';
    private $paymentTitle;
    private $recipient;
    private $startDate;
    private $endDate;
    private $changeableQuantity;
    private $predefinedPayment;
    private $currency;
    private $kdv;
    private $viaEmailSms;
    private $emailText;
    private $smsText;

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function setPaymentTitle($title)
    {
        Validate::paymentTitle($title);
        $this->paymentTitle = $title;
    }

    public function setRequestType(RequestType $requestType)
    {
        $this->params['request_type']        = $requestType->getRequestType();
        $this->params['request_action_type'] = $requestType->getRequestActionType();
        $this->params['request_period']      = $requestType->getRequestPeriod();
        $this->params['repetition_count']    = $requestType->getRepetitionCount();
    }

    public function setPaymentItem(PaymentItem $paymentItem)
    {
        $this->params['payment_item']           = $paymentItem->getItem();
        $this->params['payment_free_amount']    = $paymentItem->getFreeAmount();
        $this->params['payment_free_title']     = $paymentItem->getFreeTitle();
        $this->params['quantity']               = $paymentItem->getQuantity();
    }

    public function setRecipient($recipient)
    {
        Validate::recipient($recipient);
        $this->recipient = $recipient;
    }

    public function setStartDate($startDate)
    {
        Validate::date($startDate);
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate)
    {
        Validate::date($endDate);
        $this->endDate = $endDate;
    }

    public function setChangeableQuantity($quantity)
    {
        Validate::quantity($quantity);
        $this->changeableQuantity = $quantity;
    }

    public function setPredefinedPayment($payment)
    {
        Validate::predefinedPayment($payment);
        $this->predefinedPayment = $payment;
    }

    public function setCurrency($currency)
    {
        Validate::currency($currency);
        $this->currency = $currency;
    }

    public function setKdv($kdv)
    {
        Validate::kdv($kdv);
        $this->kdv = $kdv;
    }

    public function setViaEmailSms($viaEmailSms)
    {
        Validate::onOff($viaEmailSms);
        $this->viaEmailSms = $viaEmailSms;
    }

    public function setEmailText($emailText)
    {
        Validate::emailText($emailText);
        $this->emailText = $emailText;
    }

    public function setSmsText($smsText)
    {
        Validate::smsText($smsText);
        $this->smsText = $smsText;
    }

    protected function createRequest() {
        parent::createRequest();
        $this->params['type']                   = self::type;
        $this->params['set_param']              = self::set_param;
        $this->params['title']                  = $this->paymentTitle;
        $this->params['recipient']              = $this->recipient;
        $this->params['start_date']             = $this->startDate;
        $this->params['end_date']               = $this->endDate;
        $this->params['changeable_quantity']    = $this->changeableQuantity;
        $this->params['predefined_payment']     = $this->predefinedPayment;
        $this->params['currency']               = $this->currency;
        $this->params['kdv']                    = $this->kdv;
        $this->params['via_email_sms']          = $this->viaEmailSms;
        $this->params['email_text']             = $this->emailText;
        $this->params['sms_text']               = $this->smsText;
        $this->params['hash']               = self::generateHash($this->params,$this->password);
    }

    public function execute(){
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }
}