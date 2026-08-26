FROM php:8.1-apache

# Install basic system files & required PHP components
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Enable Apache ModRewrite for Laravel Routing structure
RUN a2enmod rewrite

# Setup working directory layout
WORKDIR /var/www/html
COPY . /var/www/html

# Install package dependencies cleanly, bypassing restrictive environment requirements
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# Force Apache root path directly down into Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Create a secure production .env file inside the container using the Render variables
RUN echo "APP_NAME=\"sky-hackeR\"" > .env && \
    echo "APP_ENV=production" >> .env && \
    echo "APP_KEY=\${APP_KEY}" >> .env && \
    echo "APP_DEBUG=false" >> .env && \
    echo "LOG_CHANNEL=stderr" >> .env && \
    echo "DB_CONNECTION=mysql" >> .env && \
    echo "DB_HOST=\${DB_HOST}" >> .env && \
    echo "DB_PORT=\${DB_PORT}" >> .env && \
    echo "DB_DATABASE=\${DB_DATABASE}" >> .env && \
    echo "DB_USERNAME=\${DB_USERNAME}" >> .env && \
    echo "DB_PASSWORD=\${DB_PASSWORD}" >> .env

# Clear out and cleanly cache framework profiles using the freshly built internal .env
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan config:cache

# Fix folder write restrictions permanently
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 80
