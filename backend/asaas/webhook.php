<?php

//    $exemplo = '{"id":"evt_05b708f961d739ea7eba7e4db318f621&7712248","event":"PAYMENT_CREATED","dateCreated":"2024-11-10 18:54:18","payment":{"object":"payment","id":"pay_6kmy0qdqpmk7vbte","dateCreated":"2024-11-10","customer":"cus_000006340074","paymentLink":null,"value":10,"netValue":9.01,"originalValue":null,"interestValue":null,"description":"teste webhook","billingType":"PIX","pixTransaction":null,"status":"PENDING","dueDate":"2024-11-13","originalDueDate":"2024-11-13","paymentDate":null,"clientPaymentDate":null,"installmentNumber":null,"invoiceUrl":"https://sandbox.asaas.com/i/6kmy0qdqpmk7vbte","invoiceNumber":"06949674","externalReference":null,"deleted":false,"anticipated":false,"anticipable":false,"creditDate":null,"estimatedCreditDate":null,"transactionReceiptUrl":null,"nossoNumero":null,"bankSlipUrl":null,"lastInvoiceViewedDate":null,"lastBankSlipViewedDate":null,"discount":{"value":0.00,"limitDate":null,"dueDateLimitDays":0,"type":"FIXED"},"fine":{"value":0.00,"type":"FIXED"},"interest":{"value":0.00,"type":"PERCENTAGE"},"postalService":false,"custody":null,"refunds":null}}';

    $post = file_get_contents('php://input');
    $json = json_decode($post);

    if($json->payment->externalReference == 'BACKHAND'){
        saveFile($post);        
        switch ($json->event) {
            case 'PAYMENT_CREATED':
                createPayment($json);
                break;
            case 'PAYMENT_RECEIVED':
                receivePayment($json);
                break;
            case 'PAYMENT_CHECKOUT_VIEWED':
                checkoutPayment($json);
                break;
            case 'PAYMENT_OVERDUE':
                overduePayment($json);
                break;
            case 'PAYMENT_BANK_SLIP_VIEWED':
                bankCkeckoutPayment($json);
                break;
    
        }
    }

    function createPayment($payment) {
        saveFile("Pagamento Criado: ID ".$payment->id."\r\nCLIENTE ID:".$payment->payment->customer."\r\nVALOR R$".$payment->payment->value."\r\n");
    }

    function receivePayment($payment) {
        $asaas_id = $payment->payment->customer;
        $valor = $payment->payment->value;
        require_once('../connect.php');
        $query = 'CALL sp_add_credit("'.$asaas_id.'","'. getMonth($valor).'","'.$valor.'");';
        $result = mysqli_query($conexao, $query);
        if(is_object($result)){
            saveFile('Credito adicionado!');
        }
        $conexao->close();
        saveFile("Pagamento Efetuado: ID ".$payment->id."\r\nCLIENTE ID:".$asaas_id."\r\nVALOR R$".$valor."\r\n");
    }

    function checkoutPayment($payment) {
        saveFile("Pagamento Visualizado: ID ".$payment->id."\r\nCLIENTE ID:".$payment->payment->customer."\r\nVALOR R$".$payment->payment->value."\r\n");
    }

    function bankCkeckoutPayment($payment) {
        saveFile("Boleto Visualizado: ID ".$payment->id."\r\nCLIENTE ID:".$payment->payment->customer."\r\nVALOR R$".$payment->payment->value."\r\n");
    }


    function overduePayment($payment) {
        saveFile("Pagamento Vencido: ID ".$payment->id."\r\nCLIENTE ID:".$payment->payment->customer."\r\nVALOR R$".$payment->payment->value."\r\n");
    }

    function saveFile($txt){        
        $path = getcwd().'/webhook.txt';
        $fp = fopen($path, "a");
        fwrite($fp,$txt."\r\n");
        fclose($fp);
    }

    function getMonth($valor){
        $out = 0;
        switch($valor){
            case 100:
                $out = 1;
                break;
            case 270:
                $out = 3;
                break;
            case 480:
                $out = 6;
                break;
            case 840:
                $out = 12;
                break;
        }
        return $out;
    }

//     http_response_code(200);

?>