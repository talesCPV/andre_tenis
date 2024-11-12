<?php
    require_once('vendor/autoload.php');

    if(isset($_POST['body'])){

      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', 'https://sandbox.asaas.com/api/v3/payments', [
        'body' => $_POST['body'],
        'headers' => [
          'accept' => 'application/json',
          'access_token' => access_token,
          'content-type' => 'application/json',
        ],
      ]);

      echo $response->getBody();
    }

?>  