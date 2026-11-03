# syntax=docker/dockerfile:1

# 1. Thema-assets bouwen (Tailwind, Webpack, fonts)
FROM node:22-alpine AS assets
WORKDIR /build
COPY web/app/themes/sv-basetheme/package.json web/app/themes/sv-basetheme/package-lock.json ./
RUN npm ci --no-audit --no-fund
COPY web/app/themes/sv-basetheme/ ./
RUN npm run build

# 2. Composer-pakketten installeren. COMPOSER_AUTH (JSON met de ACF Pro-login) bestaat alleen in deze stage
#    en komt dus niet in de uiteindelijke image terecht.
FROM serversideup/php:8.4-cli AS vendor
ARG COMPOSER_AUTH
WORKDIR /var/www/html
COPY --chown=www-data:www-data composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-progress --prefer-dist --no-scripts --no-autoloader
COPY --chown=www-data:www-data . .
RUN composer dump-autoload --no-dev --optimize

# 3. Productie-image: PHP-FPM + Nginx met web/ als webroot
FROM serversideup/php:8.4-fpm-nginx
ENV NGINX_WEBROOT=/var/www/html/web \
    PHP_OPCACHE_ENABLE=1 \
    PHP_UPLOAD_MAX_FILE_SIZE=64M \
    PHP_POST_MAX_SIZE=64M

USER root
RUN install-php-extensions mysqli gd exif intl
USER www-data

WORKDIR /var/www/html
COPY --from=vendor --chown=www-data:www-data /var/www/html ./
COPY --from=assets --chown=www-data:www-data /build/dist web/app/themes/sv-basetheme/dist
RUN mkdir -p web/app/uploads web/app/cache
