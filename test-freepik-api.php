<?php
/**
 * Test Freepik API connection
 */

$api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';

// Test basic API connection
function test_freepik_api($api_key) {
    // Try the search endpoint
    $url = 'https://api.freepik.com/v1/resources?term=business&limit=1';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'x-freepik-api-key: ' . $api_key
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    echo "HTTP Code: $http_code\n";
    if ($error) {
        echo "CURL Error: $error\n";
    }
    echo "Response: " . substr($response, 0, 500) . "\n\n";
    
    return $response;
}

echo "Testing Freepik API...\n";
echo "API Key: " . substr($api_key, 0, 10) . "...\n\n";

$response = test_freepik_api($api_key);

// Try to decode the response
$data = json_decode($response, true);
if ($data) {
    echo "API Response Structure:\n";
    print_r(array_keys($data));
    
    if (isset($data['error'])) {
        echo "\nError from API:\n";
        print_r($data['error']);
    }
    
    if (isset($data['data']) && is_array($data['data']) && count($data['data']) > 0) {
        echo "\nFirst result:\n";
        print_r($data['data'][0]);
    }
}