<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://test.payfull.com/integration/api/v1");

$request = new Payfull\Requests\Sale3D($config);
$request->setPaymentTitle('Ödeme başlığı');
$request->setPassiveData('Ödeme ile ilgili bilgiler');
$request->setCurrency('TRY');
$request->setTotal('13.00');
$request->setInstallment('1');
$request->setBankId('Akbank');
$request->setGateway('10001');
$request->setReturnUrl('https://www.payfull.com');

$paymentCard = new Payfull\Models\PaymentCard();
$paymentCard->setCardHolderName('Payfull Ödeme Çözümleri');
$paymentCard->setCardNumber('4355084355084358');
$paymentCard->setExpireMonth('12');
$paymentCard->setExpireYear('2030');
$paymentCard->setCvc('000');
$request->setPaymentCard($paymentCard);

$customer = new Payfull\Models\CustomerInfo();
$customer->setName('Faruk');
$customer->setSurname('Cinemre');
$customer->setEmail('faruk@payfull.com');
$customer->setPhoneNumber('05399999999');
$customer->setTcNumber('37418133976');
$request->setCustomerInfo($customer);

$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;
