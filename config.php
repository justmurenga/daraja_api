<?php

    function insert_response($jsonMpesaResponse)
    {
        $dbHost = "127.0.0.1";
        $dbName = "payments";
        $dbUser = "root";
        $dbPass = "mysql";

        try {
            $con = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            echo "Connection Success";
        } catch (PDOException $e) {

            die("Error connecting " . $e->getMessage());

        }
        try {
            $insert = $con->prepare("INSERT INTO `mobile_payments`(`TransID`, `TransactionType`, `TransTime`, `TransAmount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `OrgAccountBalance`, `ThirdPartyTransID`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`) VALUES(TransactionType,TransID,TransTime,TransAmount,BusinessShortCode,BillRefNumber,InvoiceNumber,OrgAccountBalance,ThirdPartyTransID,MSISDN,FirstName,MiddleName,LastName)");

            $insert->execute(array($jsonMpesaResponse));
        }
        catch (PDOException $e){
           $errlog = fopen('error.txt', 'a');
           fwrite($errlog,$e->getMessage());
           fclose($errlog);

           $logFailedTransaction = fopen('failedTransaction','a');
           fwrite($logFailedTransaction,json_encode($jsonMpesaResponse));
           fclose($logFailedTransaction);
        }

}

?>
