<?php

namespace Payfull;

class Validate
{
    const currencyList = [
        "TRY",
        "USD",
        "EUR",
        "GBP"
    ];

    const helpList = [
        "1",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "10",
        "11",
        "12",
    ];

    public static function bin($bin)
    {
       if(strlen($bin) != 6) {
           Errors::throwError('WRONG_BIN_LENGTH');
       } else {
           return true;
       }
    }

    public static function paymentTitle($title)
    {
        if(strlen($title) >= 50){
            Errors::throwError('TITLE_TOO_LONG');
        } else {
            return true;
        }
    }

    public static function passiveData($passiveData)
    {
        return true;
    }

    public static function currency($currency)
    {
        if(in_array($currency, self::currencyList)){
            return true;
        } else {
            Errors::throwError('CURRENCY_NOT_SUPPORTED');
        }
    }

    public static function total($total)
    {
        if(is_float((float)$total)) {
            return true;
        } else {
            Errors::throwError('TOTAL_MALFORMED');
        }
    }

    public static function installment($installment)
    {
        if (in_array($installment,self::helpList)){
            return true;
        } else {
            Errors::throwError('INSTALLMENT_NOT_SUPPORTED');
        }
    }

    public static function bankId($bankId)
    {
        if(is_string($bankId)){
            return true;
        } else {
            Errors::throwError('WRONG_BANK_ID');
        }
    }

    public static function gateway($gateway)
    {
        if(is_int((int)$gateway)){
            return true;
        } else {
            Errors::throwError('WRONG_GATEWAY_VALUE');
        }
    }

    public static function cardHolderName($cardHolderName)
    {
        if(strlen($cardHolderName) <= 50){
            return true;
        } else {
            Errors::throwError('HOLDER_NAME_TOO_LONG');
        }
    }

    public static function cardNumber($cardNumber)
    {
        if (is_int((int)$cardNumber) && strlen($cardNumber) == 16){
            return true;
        } else {
            Errors::throwError('WRONG_CARD_NUMBER');
        }
    }

    public static function expireYear($expireYear)
    {
        if (date('Y') <= $expireYear){
            return true;
        } else {
            Errors::throwError('YEAR_NOT_SUPPORTED');
        }
    }

    public static function expireMonth($expireMonth)
    {
        if(in_array($expireMonth,self::helpList)){
            return true;
        } else {
            Errors::throwError('MONTH_NOT_SUPPORTED');
        }
    }

    public static function cvc($cvc)
    {
        if(is_int((int)$cvc)){
            return true;
        } else {
            Errors::throwError('WRONG_CVC');
        }
    }

    public static function email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            Errors::throwError('INVALID_EMAIL_FORMAT');
        }
    }

    public static function phoneNumber($phoneNumber)
    {
       return true;
    }

    public static function tcNumber($tcNumber) {
        // Length of number must be 11
        if(strlen($tcNumber) != 11) {
            return FALSE;
        }
        // Reset registers
        $p = 0;
        $s = 0;
        $x = 0;
        $y = 0;
        // Calculate the sum of double and single digits
        for($i = 0; $i<9; $i++) {
            if($i % 2 == 0) {
                $s += $tcNumber[$i];
            } else {
                $p += $tcNumber[$i];
            }
            $y += $tcNumber[$i];
        }
        // Calculate number of 10. digit
        $x = (7*$s - $p) % 10;
        // Is it equal on 10. digit?
        if($x != $tcNumber[9]) {
            return FALSE;
        }
        // The sum of the first 10 digit
        $y += $x;
        // Is it equal on last digit result?
        if($y % 10 != $tcNumber[10]) {
            return FALSE;
        }
        return TRUE;
    }

    public static function returnUrl($returnUrl)
    {
        if (filter_var($returnUrl, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            Errors::throwError('RETURN_URL_NOT_VALID');
        }
    }

    public static function transactionId($transactionId)
    {
        return true;
    }

    public static function password($password)
    {
        return true;
    }

    public static function address($address)
    {
        return true;
    }

    public static function company($company)
    {
        return true;
    }

    public static function taxNumber($taxNumber)
    {
        return true;
    }

    public static function taxOffice($taxOffice)
    {
        return true;
    }

    public static function token($token)
    {
        return true;
    }

    public static function requestType($type)
    {
        return true;
    }

    public static function requestActionType($type)
    {
        return true;
    }

    public static function requestPeriod($period)
    {
        return true;
    }

    public static function repetitionCount($count)
    {
        return true;
    }

    public static function recipient($recipient)
    {
        return true;
    }

    public static function date($date)
    {
        return true;
    }

    public static function quantity($quantity)
    {
        return true;
    }

    public static function predefinedPayment($predefinedPayment)
    {
        return true;
    }

    public static function kdv($kdv)
    {
        return true;
    }

    public static function onOff($onOff)
    {
        return true;
    }

    public static function emailText($emailText)
    {
        return true;
    }

    public static function smsText($smsText)
    {
        return true;
    }

    public static function item($item)
    {
        return true;
    }

    public static function freeAmount($freeAmount)
    {
        return true;
    }
}