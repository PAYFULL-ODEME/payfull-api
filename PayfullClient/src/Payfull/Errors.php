<?php

namespace Payfull;

class Errors
{

    private static $errorArr = [
        "WRONG_BIN_LENGTH"                  => "BIN değeri 6 karakterden oluşmalıdır. (setBin)",
        "RESPONSE_IS_FALSE"                 => "Response değeri boş döndü. (setApiUrl)",
        "TITLE_TOO_LONG"                    => "Ödeme başlığı çok uzun. (setPaymentTitle)",
        "CURRENCY_NOT_SUPPORTED"            => "Para birimi desteklenmiyor. (setCurrency",
        "TOTAL_MALFORMED"                   => "Total değeri float(1.00) olmalıdır. (setTotal)",
        "INSTALLMENT_NOT_SUPPORTED"         => "Taksit değeri hatalıdır. (setInstallment)",
        "WRONG_BANK_ID"                     => "Bank id değeri hatalıdır. (setBankId)",
        "WRONG_GATEWAY_VALUE"               => "Gateway değeri hatalıdır. (setGateway)",
        "HOLDER_NAME_TOO_LONG"              => "Holder name değeri hatalıdır. (setHolderName)",
        "WRONG_CARD_NUMBER"                 => "Kart numarası hatalıdır. (setCardNumber)",
        "YEAR_NOT_SUPPORTED"                => "Yıl değeri hatalıdır. (setExpireYear)",
        "MONTH_NOT_SUPPORTED"               => "Ay değeri hatalıdır. (setExpireMonth)",
        "WRONG_CVC"                         => "Cvc değeri hatalıdır. (setCvc)",
        "INVALID_EMAIL_FORMAT"              => "E-mail formatı hatalıdır. (setEmail)",
        "INVALID_PHONE_NUMBER"              => "Telefon numarası formatı hatalıdır. (setPhoneNumber)",
        "INVALID_TC_NUMBER"                 => "Tc numarası formatı hatalıdır. (setTcNumber)",
        "RETURN_URL_NOT_VALID"              => "Return Url formatı hatalıdır. (setReturnUrl)",
    ];

    public static function throwError($error)
    {
        throw new \Exception(self::$errorArr[$error]);
    }

}