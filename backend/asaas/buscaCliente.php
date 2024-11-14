<?php

    require_once('vendor/autoload.php');

    $client = new \GuzzleHttp\Client();

    $response = $client->request('GET', asaas_api.'/customers', [
        'headers' => [
            'accept' => 'application/json',
            'access_token' => access_token,
        ],
    ]);

    $out = '{"OK":0}';

    if($_POST['asaas_id']==''){
        $out = $response->getBody();
    }else{

        $data = json_decode($response->getBody())->data;

        for ($i=0; $i<count($data); $i++) {
            if($data[$i]->id == $_POST['asaas_id']){
                $out = $data[$i];
            }
        }
    }

    print json_encode($out);

?>