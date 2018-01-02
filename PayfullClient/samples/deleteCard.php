<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://yourSubDomain.payfull.com/integration/api/v1");

$request = new Payfull\Requests\DeleteCard($config);
$request->setUserEmail('faruk@payfull.com');
$request->setToken('A5NVH5VFTXE3XT3DUTVJMTD2BR2U7K5LBS2UNOXFTA5W2BII');

$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;