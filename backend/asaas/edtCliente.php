<?php
    require_once('vendor/autoload.php');

    if(isset($_POST['cust']) && isset($_POST['body'])){    
        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', 'https://sandbox.asaas.com/api/v3/customers/'.$_POST['cust'], [
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