<?php
    $uip = $_GET[uip];
    $mac = $_GET[mac];
    $client_mac = $_GET[client_mac];
    $svcCode = $_GET[svcCode];

    header('Content-Type: text/json');
    header('Access-Control-Allow-Origin: *'); 

    $rewdata = '{"uip" : "'.$uip.'", "mac" : "'.$mac.'"client_mac" : "'.$client_mac.'"svccode" : "'.$svcCode.'"}';

    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://snc.nexpector.com/auth/connectWifi',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$rewdata,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: text/plain'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

//echo $response;

$vurl = "http://ad.focad.ph/nestle/p5off/landing.php";
$durl = "Location: ".$vurl;
header($durl);


?>
