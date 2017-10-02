<?php
include_once ('../src/Payfull/loader.php');

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://test.payfull.com/integration/api/v1");

$request = new Payfull\Requests\SetUser($config);

$user = new Payfull\Models\User();
$user->setName('Faruk');
$user->setSurname('Cinemre');
$user->setEmail('faruk@payfull.com');
$user->setPhoneNumber('05399999999');
$user->setPassword('123456');
$user->setAddress('istanbul / Turkey');
$user->setCompany('Payfull');
$user->setTaxNumber('123456');
$user->setTaxOffice('123456');
$user->setTcNumber('12345678945');  // Opsiyonel
$request->setUserInfo($user);


$response = $request->execute();

echo "<pre>";
var_dump($response);
echo "</pre>";
die;