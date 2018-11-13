<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://dev.payfull.com/integration/api/v1");

$request = new Payfull\Requests\TransactionStatus($config);
$request->setMerchantTrxId('xxx-0411684-0354354');
$request->setPassiveData('xxx xx xx');
$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;