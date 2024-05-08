<?php
// GET 매개변수에서 값 추출
$svccode = isset($_GET['svccode']) ? $_GET['svccode'] : '';
$res = isset($_GET['res']) ? $_GET['res'] : '';
$uamip = isset($_GET['uamip']) ? $_GET['uamip'] : '';
$uamport = isset($_GET['uamport']) ? $_GET['uamport'] : '';
$challenge = isset($_GET['challenge']) ? $_GET['challenge'] : '';
$mac = isset($_GET['mac']) ? $_GET['mac'] : '';
$client_mac = isset($_GET['client_mac']) ? $_GET['client_mac'] : '';
$uip = isset($_GET['uip']) ? $_GET['uip'] : '';
$vendor = isset($_GET['vendor']) ? $_GET['vendor'] : '';
$sessionid = isset($_GET['sessionid']) ? $_GET['sessionid'] : '';
$svcCode = isset($_GET['svcCode']) ? $_GET['svcCode'] : '';

$header = array(
    'Content-Type: application/json',
    'Access-Control-Allow-Origin: *'
);

// JSON 형태로 데이터 생성
$rewdata = json_encode(array(
    'userName' => $client_mac,
    'svccode' => 'IF',
    'res' => $res,
    'uamip' => $uamip,
    'uamport' => $uamport,
    'challenge' => $challenge,
    'mac' => $mac,
    'client_mac' => $client_mac,
    'uip' => $uip,
    'vendor' => $vendor,
    'sessionid' => $sessionid,
    'svcCode' => 'IF'
));

//echo "rewdata: $rewdata<br>";

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
  CURLOPT_POSTFIELDS => $rewdata,
  CURLOPT_HTTPHEADER => $header,
));

$response = curl_exec($curl);

$vurl = "http://192.168.182.1:3990/www/coova.html?url=https://ad.focad.ph/landing/basic/";

// 페이지 전환 주석 처리
header("Location: ".$vurl);
exit();
?>
