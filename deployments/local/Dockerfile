FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
  git zip unzip libpng-dev libzip-dev default-mysql-client \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql zip gd
RUN a2enmod rewrite

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier uniquement composer.* d'abord (cache)
COPY app/composer.json app/composer.lock* ./

RUN composer update --no-interaction --optimize-autoloader
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --optimize-autoloader

# Copier le reste du code
COPY app/ /var/www/html/

COPY deployments/local/apache.conf /etc/apache2/conf-available/template-master.conf

RUN sed -i 's!/var/www/html!/var/www/html/public!g' \
  /etc/apache2/sites-available/000-default.conf \
  && a2enconf template-master

EXPOSE 80
CMD ["apache2-foreground"]
