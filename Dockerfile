FROM composer:2.3.8 as composer_build

WORKDIR /app
COPY . /app
#RUN apt-get update && apt-get install -y \ git \ curl \ libpng-dev \ libonig-dev \ libxm12-dev \ zip \ unzip
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs --no-interaction --no-plugins --no-scripts --prefer-dist
RUN docker-php-ext-install gd mysqli pdo pdo_mysql


FROM php:8.1.10
COPY --from=composer_build /app/ /app/
WORKDIR /app
CMD php artisan serve --host=0.0.0.0 --port $PORT
EXPOSE $PORT
