<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://yourSubDomain.payfull.com/integration/api/v1");

$request = new Payfull\Requests\ReturnTransaction($config);
$request->setPassiveData('Ödeme ile ilgili bilgiler');
$request->setTransactionId('P_F_fecb674a46_0f2e7c3b8');
$request->setTotal('12.00');
$request->setMerchantTrxId('xxx-0411684-0354354');  // Opsiyonel

$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;