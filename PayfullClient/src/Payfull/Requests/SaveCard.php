<?php

namespace Payfull\Requests;

use Payfull\Config;
use Payfull\Models\Card;
use Payfull\Validate;
use Payfull\Responses\Responses;

class SaveCard extends Request {

    const TYPE = 'Set';
    const SETPARAM = 'Card';
    const CARDOPERATION = 'add';
    private $userEmail;

    public function __construct(Config $config)
    {
        parent::__construct($config, self::TYPE);
    }

    public function setPaymentCard(Card $paymentCard)
    {
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

    protected function createRequest()
    {
        $this->params['set_param']      = self::SETPARAM;
        $this->params['card_op']        = self::CARDOPERATION;
        $this->params['user_email']     = $this->userEmail;
        parent::createRequest();
    }

    public function execute()
    {
        $this->createRequest();
        $response = self::send($this->endpoint,$this->params);
        return Responses::processResponse($response);
    }

}