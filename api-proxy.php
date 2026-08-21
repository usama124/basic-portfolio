<?php
// Read API key from server environment or config
$apiKey = getenv('X_API_KEY') ?: 'ai_webservicesAM7kJjRZay2RxrOpiGeBdhuhWGVxm7rqiWHYMSsZCCquMi6R18BwNaWr5cINWXdz';

$inputData = file_get_contents('php://input');
$endpoint = $_GET['endpoint'] ?? 'chat';

$ch = curl_init("https://ai-webservices.vercel.app/api/v1/" . $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $inputData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'X-API-Key: ' . $apiKey
]);

$response = curl_exec($ch);
curl_close($ch);

header('Content-Type: application/json');
echo $response;
?>