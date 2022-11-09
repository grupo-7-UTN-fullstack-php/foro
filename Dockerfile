FROM composer:2.3.8 as composer_build

WORKDIR /app
COPY . /app
RUN composer install --optimize-autoloader --no-dev --ignore-platform-reqs --no-interaction --no-plugins --no-scripts --prefer-dist
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-configure pdo_mysql

FROM php:8.1.10
COPY --from=composer_build /app/ /app/
WORKDIR /app
CMD php artisan serve --host=0.0.0.0 --port $PORT
EXPOSE $PORT
