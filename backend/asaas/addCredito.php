<?php
    require_once('vendor/autoload.php');

    if(isset($_POST['asaas_id']) && isset($_POST['value'])){

        $today = date("Y-m-d H:i:s");
        $client = new \GuzzleHttp\Client();
        $body = '{"billingType":"UNDEFINED","customer":"'.$_POST['asaas_id'].'","value":'.$_POST['value'].',"dueDate":"'.date('Y-m-d', strtotime($today. ' + 2 days')).'","externalReference":"BACKHAND","postalService":false}';

        $response = $client->request('POST', asaas_api.'/payments', [
            'body' => $body,
            'headers' => [
                'accept' => 'application/json',
                'access_token' => access_token,
                'content-type' => 'application/json',
            ],
      ]);

      echo $response->getBody();

    }

?>  