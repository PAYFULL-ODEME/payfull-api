<?php

namespace Payfull\Models;

use Payfull\Validate;

class User
{
    const operation = 'add';
    private $name;
    private $surname;
    private $email;
    private $phoneNumber;
    private $tcNumber;
    private $password;
    private $address;
    private $company;
    private $taxNumber;
    private $taxOffice;


    public function setTaxOffice($taxOffice)
    {
        Validate::taxOffice($taxOffice);
        $this->taxOffice = $taxOffice;
    }

    public function getTaxOffice()
    {
        return $this->taxOffice;
    }

    public function setTaxNumber($taxNumber)
    {
        Validate::taxNumber($taxNumber);
        $this->taxNumber = $taxNumber;
    }

    public function getTaxNumber()
    {
        return $this->taxNumber;
    }

    public function setCompany($company)
    {
        Validate::company($company);
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setPassword($password)
    {
        Validate::password($password);
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setAddress($address)
    {
        Validate::address($address);
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

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

}