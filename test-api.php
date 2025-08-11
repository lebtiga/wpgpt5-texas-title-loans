<?php
/**
 * Test Freepik API directly
 */

$api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';

function test_freepik_api($query, $api_key) {
    echo "\n=== Testing query: '$query' ===\n";
    
    $url = "https://api.freepik.com/v1/resources?locale=en-US&page=1&limit=3&order=latest&filters[content_type][photo]=1";
    $url .= "&term=" . urlencode($query);
    
    echo "URL: $url\n\n";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept-Language: en-US',
        'x-freepik-api-key: ' . $api_key,
        'Accept: application/json'
    ]);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    echo "HTTP Code: $http_code\n";
    
    if ($error) {
        echo "CURL Error: $error\n";
        return;
    }
    
    if ($http_code !== 200) {
        echo "API Error Response:\n";
        echo $response . "\n";
        return;
    }
    
    $data = json_decode($response, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON Parse Error: " . json_last_error_msg() . "\n";
        echo "Raw response:\n$response\n";
        return;
    }
    
    echo "Response structure:\n";
    echo "- Total results: " . ($data['meta']['total'] ?? 'N/A') . "\n";
    echo "- Items returned: " . count($data['data'] ?? []) . "\n\n";
    
    if (!empty($data['data'])) {
        foreach ($data['data'] as $i => $item) {
            echo "Item " . ($i + 1) . ":\n";
            echo "  - ID: " . ($item['id'] ?? 'N/A') . "\n";
            echo "  - Title: " . ($item['title'] ?? 'N/A') . "\n";
            
            // Check different possible image URL locations
            $image_url = null;
            
            // Try different paths in the response
            if (!empty($item['image']['source']['url'])) {
                $image_url = $item['image']['source']['url'];
                echo "  - Image URL (source): $image_url\n";
            } elseif (!empty($item['url'])) {
                $image_url = $item['url'];
                echo "  - Image URL (url): $image_url\n";
            } elseif (!empty($item['preview']['url'])) {
                $image_url = $item['preview']['url'];
                echo "  - Image URL (preview): $image_url\n";
            } elseif (!empty($item['thumbnails']) && is_array($item['thumbnails'])) {
                $largest = end($item['thumbnails']);
                if (!empty($largest['url'])) {
                    $image_url = $largest['url'];
                    echo "  - Image URL (thumbnail): $image_url\n";
                }
            }
            
            if (!$image_url) {
                echo "  - No image URL found in response\n";
                echo "  - Available keys: " . implode(', ', array_keys($item)) . "\n";
            }
        }
    } else {
        echo "No results found\n";
    }
}

// Test a few queries
$test_queries = [
    'houston skyline',
    'business approval',
    'car keys'
];

foreach ($test_queries as $query) {
    test_freepik_api($query, $api_key);
    sleep(1); // Rate limiting
}

echo "\n=== API Test Complete ===\n";