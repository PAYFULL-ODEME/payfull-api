<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://yourSubDomain.payfull.com/integration/api/v1");

$request = new Payfull\Requests\SaveCard($config);
$request->setUserEmail('faruk@payfull.com');

$paymentCard = new Payfull\Models\Card();
$paymentCard->setCardHolderName('Payfull Ödeme Çözümleri');
$paymentCard->setCardNumber('4355084355084358');
$paymentCard->setExpireMonth('12');
$paymentCard->setExpireYear('2030');
$paymentCard->setCvc('000');
$request->setPaymentCard($paymentCard);

$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;