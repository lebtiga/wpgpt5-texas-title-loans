<?php
/**
 * WordPress Configuration for Railway Deployment
 * 
 * This file should be renamed to wp-config.php when deploying
 * or used as reference for Railway environment variables
 */

// Railway Database Configuration
define( 'DB_NAME', getenv('MYSQLDATABASE') ?: 'wordpress' );
define( 'DB_USER', getenv('MYSQLUSER') ?: 'root' );
define( 'DB_PASSWORD', getenv('MYSQLPASSWORD') ?: '' );
define( 'DB_HOST', getenv('MYSQLHOST') ? getenv('MYSQLHOST') . ':' . getenv('MYSQLPORT') : 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// Authentication Keys and Salts
define( 'AUTH_KEY',         getenv('WORDPRESS_AUTH_KEY') ?: 'put-your-unique-phrase-here' );
define( 'SECURE_AUTH_KEY',  getenv('WORDPRESS_SECURE_AUTH_KEY') ?: 'put-your-unique-phrase-here' );
define( 'LOGGED_IN_KEY',    getenv('WORDPRESS_LOGGED_IN_KEY') ?: 'put-your-unique-phrase-here' );
define( 'NONCE_KEY',        getenv('WORDPRESS_NONCE_KEY') ?: 'put-your-unique-phrase-here' );
define( 'AUTH_SALT',        getenv('WORDPRESS_AUTH_SALT') ?: 'put-your-unique-phrase-here' );
define( 'SECURE_AUTH_SALT', getenv('WORDPRESS_SECURE_AUTH_SALT') ?: 'put-your-unique-phrase-here' );
define( 'LOGGED_IN_SALT',   getenv('WORDPRESS_LOGGED_IN_SALT') ?: 'put-your-unique-phrase-here' );
define( 'NONCE_SALT',       getenv('WORDPRESS_NONCE_SALT') ?: 'put-your-unique-phrase-here' );

// Table Prefix
$table_prefix = getenv('WORDPRESS_TABLE_PREFIX') ?: 'wp_';

// Debugging
define( 'WP_DEBUG', filter_var(getenv('WORDPRESS_DEBUG'), FILTER_VALIDATE_BOOLEAN) );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

// Railway-specific settings
if ( getenv('RAILWAY_ENVIRONMENT') ) {
    // Force SSL in production
    define( 'FORCE_SSL_ADMIN', true );
    
    // Handle Railway's proxy
    if ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        $_SERVER['HTTPS'] = 'on';
    }
    
    // Set home and site URL from environment
    if ( getenv('RAILWAY_STATIC_URL') ) {
        define( 'WP_HOME', 'https://' . getenv('RAILWAY_STATIC_URL') );
        define( 'WP_SITEURL', 'https://' . getenv('RAILWAY_STATIC_URL') );
    }
}

// Performance optimizations
define( 'WP_CACHE', true );
define( 'COMPRESS_CSS', true );
define( 'COMPRESS_SCRIPTS', true );
define( 'CONCATENATE_SCRIPTS', true );
define( 'ENFORCE_GZIP', true );

// Increase memory limit
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

// File upload settings
define( 'WP_POST_REVISIONS', 5 );
define( 'AUTOSAVE_INTERVAL', 120 );
define( 'EMPTY_TRASH_DAYS', 30 );

// Security
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', false ); // Allow plugin/theme updates

// API Keys
define( 'FREEPIK_API_KEY', getenv('FREEPIK_API_KEY') ?: '' );

// Absolute path to the WordPress directory
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

// Sets up WordPress vars and included files
require_once ABSPATH . 'wp-settings.php';