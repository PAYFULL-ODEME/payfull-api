<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://test.payfull.com/integration/api/v1");

$request = new Payfull\Requests\Cancel($config);
$request->setPassiveData('Ödeme ile ilgili bilgiler');
$request->setTransactionId('P_F_87f1701a66_137613230');

$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;