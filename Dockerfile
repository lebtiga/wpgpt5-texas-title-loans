FROM wordpress:6-php8.2-apache

# Install additional PHP extensions and MySQL client
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copy custom theme (includes all assets)
COPY wp-content/themes/wpgpt-theme /usr/src/wordpress/wp-content/themes/wpgpt-theme

# Copy mu-plugins
COPY wp-content/mu-plugins /usr/src/wordpress/wp-content/mu-plugins

# Note: Theme assets are already included in the theme folder above
# Removed the line that was overwriting theme assets

# Create uploads directory
RUN mkdir -p /usr/src/wordpress/wp-content/uploads

# Set permissions
RUN chown -R www-data:www-data /usr/src/wordpress/wp-content \
    && chmod -R 755 /usr/src/wordpress/wp-content

# Enable Apache modules
RUN a2enmod rewrite expires headers

# Custom PHP configuration for production
RUN echo "upload_max_filesize = 64M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 64M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/uploads.ini

# Copy custom entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint-custom.sh
RUN chmod +x /usr/local/bin/docker-entrypoint-custom.sh

# Copy wp-config template for Railway
COPY wp-config-railway.php /var/www/html/wp-config-railway.php

# Health check removed - WordPress needs database setup first
# Railway will monitor the container status instead

EXPOSE 80

# Use custom entrypoint that waits for database
ENTRYPOINT ["/usr/local/bin/docker-entrypoint-custom.sh"]