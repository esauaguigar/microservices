<?php
// kvstore API url
$url = 'http://user/api_gw/api/users.php';
$curl = curl_init($url);
// Set custom headers for RapidAPI Auth and Content-Type header
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Content-Type: application/x-www-form-urlencoded'
]);
// Execute cURL request with all previous settings
$response = curl_exec($curl);
// Close cURL session
curl_close($curl);
echo $response;