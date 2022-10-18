<?php 
require __DIR__ . '/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'cuvhu71bIMAfKQrKtJijHc8Ikm4Mauth';

$payload = [
   'orderId'        => '99977',
   'deliveryDate'   => '2019-05-20',
   'orderDate'      => '2019-05-15',
   'postalCode'     => '10667',
   'incentiveType'  => 'SAMPLE',
   'user'           => [
       'firstName'     => 'Andy',
       'lastName'      => 'Adamson',
       'nickName'      => null,
       'emailAddress'  => 'andrew@sample.com',
   ],
   'items'          => [
       [
           'lineItemId'  => '1',
           'title'  => 'Adeline Slim Wallet',
           'url'  => 'https://www.yoursite.com/U00467.html',
           'sku'  => 'U00467',
       ]
   ]
];

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
$jwt = JWT::encode($payload, $key, 'HS256');
$decoded = JWT::decode($jwt, new Key($key, 'HS256'));

print_r($jwt);

/*
 NOTE: This will now be an object instead of an associative array. To get
 an associative array, you will need to cast it as such:
*/

$decoded_array = (array) $decoded;

?>