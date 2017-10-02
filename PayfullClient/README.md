[![Güncel Son Sürüm için](https://github.com/T4U/payfull-api)

Payfull üyeliği açmak için https://payfull.com

# Gereklilikler 

PHP 5.6 ve sonrası

# Yükleme 

### Manuel Yükleme

İndirmeyi buradan yapabilirsiniz [son sürüm](https://github.com/T4U/payfull-api).

```php
require_once('/dosyanın/bulunduğu/yol/PayfullClient/src/Payfull/loader.php); 
```

#Kullanım

```php

### Api Bağlantı URL'iniz ve Api Hesap bilgilerinizi set etmelisiniz. Her Request için zorunludur.

$config = new Payfull\Config();
$config->setApiKey("test");
$config->setApiSecret("123456");
$config->setApiUrl("https://test.payfull.com/integration/api/v1");

# İlgili requestin nesnesini oluşturup belirli parametrelere değer atamalısınız. Örnek olarak Satış Requesti verilmiştir.

$request = new Payfull\Requests\Sale($config);
$request->setPaymentTitle('Ödeme başlığı');
$request->setPassiveData('Ödeme ile ilgili bilgiler');
$request->setCurrency('TRY');
$request->setTotal('13.00');
$request->setInstallment('1');
$request->setBankId('Akbank');
$request->setGateway('10001');

# Satış için kullanılacak olan kart bilgilerini set edip satış objesinin içine ilgili kartı göndermelisiniz.

$paymentCard = new Payfull\Models\Card();
$paymentCard->setCardHolderName('Payfull Ödeme Çözümleri');
$paymentCard->setCardNumber('4355084355084358');
$paymentCard->setExpireMonth('12');
$paymentCard->setExpireYear('2030');
$paymentCard->setCvc('000');
$request->setPaymentCard($paymentCard);

# Satış işlemini yapan kullanıcının bilgilerini set edip satış objesinie göndermelisiniz.

$customer = new Payfull\Models\Customer();
$customer->setName('Faruk');
$customer->setSurname('Cinemre');
$customer->setEmail('faruk@payfull.com');
$customer->setPhoneNumber('05399999999');
$customer->setTcNumber('37418133976');
$request->setCustomerInfo($customer);

# Her Request için ihtiyacınız olan execute fonksiyonuyla ihtiyacınız olan bilgileri elde edebilirsiniz.


$response = $request->execute();

echo "<pre>";
print_r($response);
echo "</pre>";
die;
```
Daha fazla örnek görmek için `samples` klasörü içerisine girebilirsiniz.


### Test Kartları Örneği

Card Number      | Bank                       | Expiration Date         | CVC
-----------      | ----                       | ---------               | ---------------
4355084355084358 | AKBANK-VISA                | 12/2030                 | 000 
5571135571135575 | AKBANK-MASTER              | 12/2030                 | 000  
4402934402934406 | TEB-VISA                   | 12/2030                 | 000 
5101385101385104 | TEB-MASTER                 | 12/2030                 | 000
4920244920244921 | HALKBANK-VISA              | 12/2030                 | 001
5404355404355405 | HALKBANK-MASTER            | 12/2030                 | 001
4022774022774026 | FINANSBANK-VISA            | 12/2030                 | 000  
5456165456165454 | FINANSBANK-MASTER          | 12/2030                 | 000  
4508034508034509 | ISBANK-VISA                | 12/2030                 | 000
5406675406675403 | ISBANK-MASTER	          | 12/2030                 | 000
4258464258464253 | ANADOLUBANK-VISA           | 12/2030                 | 000
5222405222405229 | ANADOLUBANK-MASTER         | 12/2030                 | 000
4025894025894022 | KUVEYTTURK-VISA            | 12/2030                 | 000
4555714555714556 | INGBANK-VISA               | 12/2030                 | 000
5400245400245409 | INGBANK-MASTER             | 12/2030                 | 000
5342614723204016 | GARANTI                    | 01/2017                 | 753
4506347048543223 | YKB                        | 12/2030                 | 000