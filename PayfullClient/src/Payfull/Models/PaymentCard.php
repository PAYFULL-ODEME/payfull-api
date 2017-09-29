<?php

namespace Payfull\Models;


use Payfull\Validate;

class PaymentCard
{

    private $cardHolderName;
    private $cardNumber;
    private $expireYear;
    private $expireMonth;
    private $cvc;

    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    public function setCardHolderName($cardHolderName)
    {
        Validate::cardHolderName($cardHolderName);
        $this->cardHolderName = $cardHolderName;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber)
    {
        Validate::cardNumber($cardNumber);
        $this->cardNumber = $cardNumber;
    }

    public function getExpireYear()
    {
        return $this->expireYear;
    }

    public function setExpireYear($expireYear)
    {
        Validate::expireYear($expireYear);
        $this->expireYear = $expireYear;
    }

    public function getExpireMonth()
    {
        return $this->expireMonth;
    }

    public function setExpireMonth($expireMonth)
    {
        Validate::expireMonth($expireMonth);
        $this->expireMonth = $expireMonth;
    }

    public function getCvc()
    {
        return $this->cvc;
    }

    public function setCvc($cvc)
    {
        Validate::cvc($cvc);
        $this->cvc = $cvc;
    }

}