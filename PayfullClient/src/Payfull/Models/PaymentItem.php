<?php

namespace Payfull\Models;


use Payfull\Validate;

class PaymentItem {

    private $item;
    private $freeAmount;
    private $freeTitle;
    private $quantity;

    public function setItem($paymentItem)
    {
        Validate::item($paymentItem);
        $this->item = $paymentItem;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function setFreeAmount($freeAmount)
    {
        Validate::freeAmount($freeAmount);
        $this->freeAmount = $freeAmount;
    }

    public function getFreeAmount()
    {
        return $this->freeAmount;
    }

    public function setFreeTitle($freeTitle)
    {
        Validate::paymentTitle($freeTitle);
        $this->freeTitle = $freeTitle;
    }

    public function getFreeTitle()
    {
        return $this->freeTitle;
    }

    public function setQuantity($quantity)
    {
        Validate::quantity($quantity);
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

}