<?php 

require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

//Secret Key
$secret_key = 'e53411d5c3721a4f83bcf1f622872bb048cf2e60be51eb12ab3e24b52f9f89fc
';

header('Content-Type : application/json');

//Sample hardcoded ever
$valid_username = 'admin';
$valid_password = 'password';

$data = json_decode(file_get_contents('php://input'));

if($data->username === $valid_username && $data->password === $valid_password){
    $payload = [
        'iss' => 'amarjitWebsite.com',
        'iat' => time(),
        'exp' => time() + 3600,
        'username' => $data->username
    ];

    $jwt = JWT::encode($payload, $secret_key, 'HS256');

    echo json_encode(['token' => $jwt]);
}else{
    http_response_code(401);
    echo json_encode(['error' => 'Invalid Credentials']);
}


?>