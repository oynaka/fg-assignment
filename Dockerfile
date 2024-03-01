# === PHP Stage ===
FROM php:8.2-apache-buster

ARG env
ENV ACCEPT_EULA=Y

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    gnupg \
    libxml2-dev \
    wget

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN CFLAGS="-I/usr/src/php"
RUN docker-php-ext-install gd xml iconv simplexml
RUN docker-php-ext-enable xml iconv simplexml gd mysqli pdo pdo_mysql

## Enable below Swoole when using Laravel Octane
# RUN pecl install swoole
# RUN docker-php-ext-enable swoole

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 8080

# === Run Stage ===
WORKDIR /var/www
COPY . /var/www/
RUN touch /var/www/.env
COPY conf/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN chmod 777 -R /var/www/storage/ && \
  echo "Listen 8080">>/etc/apache2/ports.conf && \
  chown -R www-data:www-data /var/www/ && \
  a2enmod rewrite
RUN composer install
RUN composer update && composer dumpautoload
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan cache:clear
RUN php artisan optimize:clear
