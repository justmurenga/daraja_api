<?php
    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';


    $ShortCode  = '600610'; // Shortcode. Same as the one on register_url.php
    $amount     = '120'; // amount the client/we are paying to the paybill
    $msisdn     = '254708374149'; // phone number paying
    $billRef    = 'SV'; // This is anything that helps identify the specific transaction. Can be a clients ID, Account Number, Invoice amount, cart no.. etc
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer NDhw7MzsUUWBzHn4Yu783dKwwkIL'));
    $curl_post_data = array(
        'ShortCode' => $ShortCode,
        'CommandID' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'Msisdn' => $msisdn,
        'BillRefNumber' => $billRef
    );
    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);
    echo $curl_response;
?>