<?php

        header("content-type: application/json");

        $response ='{
                    "ResultCode" :0,
                    "ResultDesc": "Confirmation Received successfully"
                }';

        // DATA


        $mpesaResponse = file_get_contents('php://input');

        // log data

        $logFile ="validationResponse.txt";
        $jsonMpesaResponse = json_decode($mpesaResponse,true);

        // write to file

//        $log = fopen($logFile,"a");
//        fwrite($log,$mpesaResponse);
//        fclose($log);

        $log = fopen($logFile, "a") or die("Unable to open file!");
        echo fread($log,filesize("validationResponse.txt"));
        fclose($log);

        echo $response;

?>