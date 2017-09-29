<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://test.payfull.com/integration/api/v1");

$request = new Payfull\Requests\SaleWithSavedCard($config);
$request->setPaymentTitle('Ödeme başlığı');
$request->setPassiveData('Ödeme ile ilgili bilgiler');
$request->setCurrency('TRY');
$request->setTotal('13.00');
$request->setInstallment('1');
$request->setBankId('Akbank');
$request->setGateway('10001');
$request->setToken('A5NVH5VFTXE3XT3DUTVJMTD2BR2U7K5LBS2UNOXFTA5W2BII');

$customer = new Payfull\Models\Customer();
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