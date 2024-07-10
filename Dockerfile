FROM php:latest-apache

# Install pdo_mysql extension
RUN docker-php-ext-install pdo_mysql

# Rest of your Dockerfile configuration...