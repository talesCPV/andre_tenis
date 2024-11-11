<?php
    require_once('vendor/autoload.php');

    $client = new \GuzzleHttp\Client();

    $response = $client->request('GET', 'https://sandbox.asaas.com/api/v3/payments', [
    'headers' => [
        'accept' => 'application/json',
        'access_token' => access_token,
    ],
    ]);

    echo $response->getBody();

?>