<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://yourSubDomain.payfull.com/integration/api/v1");

$request = new Payfull\Requests\ExtraInstallments($config);

$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;