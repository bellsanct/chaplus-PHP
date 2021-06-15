<?php

$base_url = "https://www.api-mabo.work/api";

$data = [
  "api_key" => "YOUR_API_KEY",
  "agent_id" => "YOUR_AGENT_KEY",
  "utterance" => "", //Please put message
];

$header = ["Accept: application/json", "Content-Type: application/json"];

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $base_url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); // POST 
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data)); // array to json 
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_HEADER, true);

$response = curl_exec($curl);

$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
$result = json_decode($body, true);

curl_close($curl);

print_r($result);

?>
