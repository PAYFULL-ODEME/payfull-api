<?php

namespace Payfull\Models;

use Payfull\Validate;

class CustomerInfo
{

    private $name;
    private $surname;
    private $email;
    private $phoneNumber;
    private $tcNumber;

    public function setName($name)
    {
        Validate::cardHolderName($name);
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSurname($surname)
    {
        Validate::cardHolderName($surname);
        $this->surname = $surname;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setEmail($email)
    {
        Validate::email($email);
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhoneNumber($phoneNumber)
    {
        Validate::phoneNumber($phoneNumber);
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setTcNumber($tcNumber)
    {
        Validate::tcNumber($tcNumber);
        $this->tcNumber = $tcNumber;
    }

    public function getTcNumber()
    {
        return $this->tcNumber;
    }

    public function createCustomerInfo(){

    }

}