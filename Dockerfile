FROM php:8.2.28-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev libxml2-dev \
    zip unzip git curl mariadb-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql xml \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --prefer-dist

COPY . .

RUN chown -R www-data:www-data /var/www/html/var /var/www/html/vendor

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
