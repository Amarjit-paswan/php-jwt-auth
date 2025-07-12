<?php 

require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = 'e53411d5c3721a4f83bcf1f622872bb048cf2e60be51eb12ab3e24b52f9f89fc
';
header('Content-Type: application/json');

//Get the token from the Authorization header
$headers = apache_request_headers();
$authHeader = $headers['Authorization'] ?? '';

if(!$authHeader || !str_starts_with($authHeader, 'Bearer ')){
    http_response_code(401);
    echo json_encode(['error' => 'Token missing']);
    exit;
}

$token = trim(str_replace('Bearer','',$authHeader));

try{
    $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
    echo json_encode(['message' => 'Access granted!', 'user' => $decoded->username]);
}catch(Exception $e){
    http_response_code(403);
    echo json_encode(['error' => 'Access denied: ' . $e->getMessage()]);
}



?>