<?php
// kvstore API url
$url = 'http://backend/api_gw/api/history.php';
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

#_____________________________

#Curl for api gateway

#https://rapidapi.com/blog/how-to-use-an-api-with-php/

#_____________________________

#mysqli not exist

#docker-php-ext-install mysqli
#apachectl restart

#_____________________________

# Error with db auth

#ALTER USER 'mysqlUsername'@'localhost' IDENTIFIED WITH mysql_native_password BY 'mysqlUsernamePassword';