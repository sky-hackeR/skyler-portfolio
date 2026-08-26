FROM php:8.2-apache

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

# Install package dependencies securely
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# ADD THESE LINES RIGHT HERE TO FIX THE CACHE AND LOGS:
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan config:cache
RUN php artisan route:cache


# Force Apache root path directly down into Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Map your system configuration strings safely to the application logic
RUN echo "PassEnv APP_KEY APP_ENV APP_DEBUG DB_CONNECTION DB_HOST DB_PORT DB_DATABASE DB_USERNAME DB_PASSWORD" >> /etc/apache2/apache2.conf

EXPOSE 80
