# Freepik MCP Setup Guide

## Installation Steps

### 1. Prerequisites
- Python 3.12 or higher
- Node.js and npm
- Your Freepik API Key: `FPSX3e1fb9d75ed20336b070cae064f424ef`

### 2. For Claude Desktop App

Add this to your Claude Desktop configuration file:

**On Mac:** `~/Library/Application Support/Claude/claude_desktop_config.json`
**On Windows:** `%APPDATA%\Claude\claude_desktop_config.json`

```json
{
  "mcpServers": {
    "freepik": {
      "command": "npx",
      "args": [
        "-y",
        "mcp-remote",
        "https://api.freepik.com/mcp",
        "--header",
        "x-freepik-api-key:FPSX3e1fb9d75ed20336b070cae064f424ef"
      ]
    }
  }
}
```

### 3. Restart Claude Desktop

After adding the configuration, restart Claude Desktop app.

### 4. Available Commands

Once installed, you can use these commands in Claude:

- **Search images**: "Search Freepik for Houston skyline photos"
- **Search icons**: "Find business icons on Freepik"
- **Generate images**: "Generate a custom image of a Houston title loan office"

## Alternative: Direct API Usage in WordPress

Since we can't install MCP in the Docker environment, here's a WordPress plugin to use Freepik directly:

```php
<?php
/**
 * Plugin Name: Freepik Image Manager
 * Description: Integrate Freepik images into WordPress
 */

class FreepikImageManager {
    private $api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';
    
    public function search_images($query, $limit = 10) {
        $url = 'https://api.freepik.com/v1/resources';
        $params = [
            'term' => $query,
            'limit' => $limit,
            'filters[license]' => 'free'
        ];
        
        $response = wp_remote_get($url . '?' . http_build_query($params), [
            'headers' => [
                'Accept' => 'application/json',
                'x-freepik-api-key' => $this->api_key
            ]
        ]);
        
        if (!is_wp_error($response)) {
            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }
        
        return null;
    }
    
    public function import_to_media_library($image_url, $title = '') {
        $upload_dir = wp_upload_dir();
        $image_data = file_get_contents($image_url);
        $filename = basename($image_url);
        
        if (wp_mkdir_p($upload_dir['path'])) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        
        file_put_contents($file, $image_data);
        
        $wp_filetype = wp_check_filetype($filename, null);
        
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => $title ?: sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        
        $attach_id = wp_insert_attachment($attachment, $file);
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        wp_update_attachment_metadata($attach_id, $attach_data);
        
        return $attach_id;
    }
}

// Usage example:
$freepik = new FreepikImageManager();
$results = $freepik->search_images('houston business');
if ($results && isset($results['data'])) {
    foreach ($results['data'] as $image) {
        // Import to WordPress media library
        $attachment_id = $freepik->import_to_media_library(
            $image['image']['source']['url'],
            $image['title']
        );
    }
}
```

## Benefits of Freepik over Unsplash

1. **More business-specific content** - Better for financial services
2. **Premium quality** - Professional stock photos
3. **Icons and vectors** - Not just photos
4. **AI generation** - Create custom images
5. **Better search relevance** - More accurate results for business terms

## Current Status

Your Houston page at http://localhost:8888/houston-title-loans-elementor/ now has:
- ✅ All content restored (12+ sections)
- ✅ Professional layout with Gutenberg blocks
- ✅ High-quality Unsplash images (working)
- ⏳ Freepik integration ready (needs local setup)

## Next Steps

1. Install Freepik MCP on your local Claude Desktop
2. Or use the WordPress plugin code above
3. Replace Unsplash images with better Freepik alternatives