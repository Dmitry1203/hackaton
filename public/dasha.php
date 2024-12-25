<?php

$subject = 'Регистрация для участия в хакатоне «ЛЕТС ХАК»';
$templateId = 3602008;

$apiKey = '1f3073122e14ce971e4262d1697cbf01';
$from = 'test@d-y.website';
$curl = curl_init();

$password = 12345;
//$to = $user->email;
$to = 'dmitry1203@gmail.com';
$replace='{"%PASS%":"'.$password.'"}';
$url = "https://api.dashamail.com/?method=transactional.send&api_key={$apiKey}&to={$to}&from_email={$from}&subject={$subject}&message={$templateId}&replace=".$replace;

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
));

$result = json_decode(curl_exec($curl));

echo $result->response->data->transaction_id;
curl_close($curl);

?>