<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://yourSubDomain.payfull.com/integration/api/v1");

$request = new Payfull\Requests\Payment($config);
$request->setPaymentTitle('Payfull Ödeme Çözümleri');
$request->setRecipient('{[faruk@payfull.com, fatih@payfull.com]}');
$request->setStartDate('01-10-2017');
$request->setEndDate('01-10-2018');
$request->setChangeableQuantity('0');
$request->setPredefinedPayment('0');
$request->setCurrency('TRY');
$request->setKdv('1');
$request->setViaEmailSms('1');
$request->setEmailText('Email içerisinde gönderilmek istenen mesaj');
$request->setSmsText('Sms içerisinde gönderilmek istenen mesaj');

$paymentItem = new Payfull\Models\PaymentItem();
$paymentItem->setItem('0');
$paymentItem->setFreeAmount('12.00');
$paymentItem->setFreeTitle('Item ismi buraya');
$paymentItem->setQuantity('1');
$request->setPaymentItem($paymentItem);

$requestType = new Payfull\Models\RequestType();
$requestType->setRequestType('recurring');
$requestType->setRequestActionType('auto');
$requestType->setRequestPeriod('1');
$requestType->setRepetitionCount('2');
$request->setRequestType($requestType);


$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;