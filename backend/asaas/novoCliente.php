<?php
    require_once('vendor/autoload.php');

    if(isset($_POST['body'])){
     
      $client = new \GuzzleHttp\Client();
      $endpoint = asaas_api.'/customers';

      $response = $client->request('POST', $endpoint, [
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