<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gmail.googleapis.com/gmail/v1/users/peterjosephcruz01@gmail.com/messages/17c15b4576979c6b',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ya29.a0ARrdaM8KTIH288SaR4TQQUwT8Km6eiccOPm8wUN6GH5JEDYwdfdwXeYL9zCbeZTaCAfgTUjFTEBETtmDQb63QR2Tyexr1RJw8mLILVH2QYfvCqjj7Z8aXAzXOjqFzQ6bmySRwc_aRIvTiNEOMHWfHPLLmnOJSQ'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;