<?php
/**
 * Fetch relevant images from Freepik API for title loan website
 */

// Your Freepik API key
$api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';

// Function to search Freepik images
function search_freepik($query, $api_key, $per_page = 10) {
    $url = 'https://api.freepik.com/v1/resources';
    
    $params = [
        'locale' => 'en-US',
        'page' => 1,
        'limit' => $per_page,
        'order' => 'popular',
        'term' => $query,
        'filters[content_type][photo]' => 1,
    ];
    
    $headers = [
        'Accept-Language: en-US',
        'Accept: application/json',
        'Content-Type: application/json',
        'x-freepik-api-key: ' . $api_key
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code === 200) {
        return json_decode($response, true);
    }
    
    return null;
}

// Search queries for title loan website
$searches = [
    'hero' => 'houston skyline business',
    'approval' => 'business approval document signing',
    'car_keys' => 'car keys hand over',
    'financial' => 'financial assistance help',
    'houston_downtown' => 'houston texas downtown',
    'customer_service' => 'customer service professional',
    'money_cash' => 'money cash loan',
    'texas_highway' => 'texas highway interstate',
    'oil_industry' => 'oil refinery houston',
    'medical_center' => 'hospital medical center'
];

$results = [];

echo "Fetching images from Freepik API...\n\n";

foreach ($searches as $key => $query) {
    echo "Searching for: $query\n";
    $data = search_freepik($query, $api_key, 3);
    
    if ($data && isset($data['data'])) {
        $results[$key] = [];
        foreach ($data['data'] as $index => $item) {
            if (isset($item['image']['source']['url'])) {
                $results[$key][] = [
                    'url' => $item['image']['source']['url'],
                    'title' => $item['title'] ?? $query,
                    'id' => $item['id'] ?? '',
                    'attribution' => 'Image by Freepik'
                ];
                echo "  - Found: " . $item['title'] . "\n";
            }
        }
    } else {
        echo "  - No results found\n";
    }
    
    // Respect API rate limits
    sleep(1);
}

echo "\n\nImage URLs for Houston Title Loan Page:\n";
echo "=====================================\n\n";

// Output the best image URLs for each category
$selected_images = [
    'hero_image' => $results['hero'][0]['url'] ?? 'https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop',
    'houston_downtown' => $results['houston_downtown'][0]['url'] ?? 'https://images.unsplash.com/photo-1587923623987-1374b6962116?w=600&h=400&fit=crop',
    'approval_process' => $results['approval'][0]['url'] ?? 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=200&fit=crop',
    'keep_your_car' => $results['car_keys'][0]['url'] ?? 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=200&fit=crop',
    'financial_help' => $results['financial'][0]['url'] ?? 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop',
    'customer_service' => $results['customer_service'][0]['url'] ?? 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?w=400&h=200&fit=crop',
    'texas_highways' => $results['texas_highway'][0]['url'] ?? 'https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=600&h=400&fit=crop',
    'oil_industry' => $results['oil_industry'][0]['url'] ?? 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&h=250&fit=crop',
    'medical_center' => $results['medical_center'][0]['url'] ?? 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=400&h=250&fit=crop'
];

foreach ($selected_images as $key => $url) {
    echo "$key:\n$url\n\n";
}

// Save results to JSON file for later use
file_put_contents('freepik_images.json', json_encode([
    'all_results' => $results,
    'selected' => $selected_images,
    'timestamp' => date('Y-m-d H:i:s')
], JSON_PRETTY_PRINT));

echo "Results saved to freepik_images.json\n";

// Note: To use these images in WordPress, you would need to:
// 1. Download them to your server
// 2. Import them to WordPress Media Library
// 3. Or use them directly if Freepik allows hotlinking (check their terms)

echo "\nNOTE: Please check Freepik's terms of service for image usage rights.\n";
echo "Some images may require attribution or have usage restrictions.\n";