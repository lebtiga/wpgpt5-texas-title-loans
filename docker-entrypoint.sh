#!/bin/bash
set -e

# Wait for MySQL to be ready
echo "Waiting for MySQL database..."

# Use environment variables from Railway
DB_HOST="${MYSQLHOST:-mysql}"
DB_PORT="${MYSQLPORT:-3306}"
DB_USER="${MYSQLUSER:-root}"
DB_PASSWORD="${MYSQLPASSWORD:-}"
DB_NAME="${MYSQLDATABASE:-wordpress}"

# Wait for database to be reachable
until mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASSWORD" -e "SELECT 1" &> /dev/null; do
  echo "MySQL is unavailable - sleeping"
  sleep 5
done

echo "MySQL is up - continuing with WordPress setup"

# Create wp-config.php if it doesn't exist
if [ ! -f /var/www/html/wp-config.php ]; then
    echo "Creating wp-config.php..."
    
    # Copy wp-config-railway.php if it exists, otherwise use environment variables
    if [ -f /var/www/html/wp-config-railway.php ]; then
        cp /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
    else
        # Generate wp-config.php from environment variables
        cat > /var/www/html/wp-config.php <<EOF
<?php
define('DB_NAME', '${DB_NAME}');
define('DB_USER', '${DB_USER}');
define('DB_PASSWORD', '${DB_PASSWORD}');
define('DB_HOST', '${DB_HOST}:${DB_PORT}');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

\$table_prefix = 'wp_';

define('WP_DEBUG', false);

// Railway URL configuration
if (!empty(\$_SERVER['HTTP_HOST'])) {
    define('WP_HOME', 'https://' . \$_SERVER['HTTP_HOST']);
    define('WP_SITEURL', 'https://' . \$_SERVER['HTTP_HOST']);
}

// Force SSL
if (isset(\$_SERVER['HTTP_X_FORWARDED_PROTO']) && \$_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    \$_SERVER['HTTPS'] = 'on';
}

// Authentication keys and salts
define('AUTH_KEY',         '$(openssl rand -base64 32)');
define('SECURE_AUTH_KEY',  '$(openssl rand -base64 32)');
define('LOGGED_IN_KEY',    '$(openssl rand -base64 32)');
define('NONCE_KEY',        '$(openssl rand -base64 32)');
define('AUTH_SALT',        '$(openssl rand -base64 32)');
define('SECURE_AUTH_SALT', '$(openssl rand -base64 32)');
define('LOGGED_IN_SALT',   '$(openssl rand -base64 32)');
define('NONCE_SALT',       '$(openssl rand -base64 32)');

// API Keys
define('FREEPIK_API_KEY', '${FREEPIK_API_KEY:-}');

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
EOF
    fi
    
    echo "wp-config.php created successfully"
fi

# Ensure proper permissions
chown -R www-data:www-data /var/www/html/wp-content
chmod -R 755 /var/www/html/wp-content

# Execute the original WordPress entrypoint
exec docker-entrypoint.sh apache2-foreground