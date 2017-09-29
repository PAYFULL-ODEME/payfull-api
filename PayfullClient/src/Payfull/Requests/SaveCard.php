<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Models\Card;
use Payfull\Validate;

class SaveCard extends Request {

    const type = 'Set';
    const setParam = 'Card';
    const cardOperation = 'add';
    private $userEmail;

    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    public function setPaymentCard(Card $paymentCard){
        $this->params['cc_name']    = $paymentCard->getCardHolderName();
        $this->params['cc_number']  = $paymentCard->getCardNumber();
        $this->params['cc_month']   = $paymentCard->getExpireMonth();
        $this->params['cc_year']    = $paymentCard->getExpireYear();
        $this->params['cc_cvc']     = $paymentCard->getCvc();
    }

    public function setUserEmail($userEmail)
    {
        Validate::email($userEmail);
        $this->userEmail = $userEmail;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    protected function createRequest() {
        parent::createRequest();
        $this->params['type']           = self::type;
        $this->params['set_param']      = self::setParam;
        $this->params['card_op']        = self::cardOperation;
        $this->params['user_email']     = $this->userEmail;
        $this->params['hash']           = self::generateHash($this->params,$this->password);
    }

    public function execute(){
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}