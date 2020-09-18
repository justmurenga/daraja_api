<?php
        require 'config.php';

        header("content-type: application/json");

        $response ='{
            "ResultCode" :0,
            "ResultDesc": "Confirmation Received successfully"
        }';

        // DATA

        $mpesaResponse = file_get_contents('php://input');

        // log data

        $logFile ="M_PESAConfirmationResponse.txt";
        $jsonMpesaResponse = json_decode($mpesaResponse,true);

        // write to file

        $log = fopen($logFile,"a");
        fwrite($log,$mpesaResponse);
        fwrite($log,"\r\n");
        fclose($log);

        echo $response;
        insert_response($jsonMpesaResponse);




?>