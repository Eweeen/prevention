FROM php:8.2-apache
RUN apt-get update && apt-get install -y \
    software-properties-common \
    apt-transport-https \
    ca-certificates \
    libicu-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install bcmath intl mbstring pdo pdo_mysql
RUN apt-get update && apt-get install -y \
    libzip-dev \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*
RUN apt-get update && apt-get install -y nodejs \
    npm

RUN a2enmod rewrite
RUN service apache2 restart

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY docker/server-api.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www

USER www-data
RUN composer install

COPY .env.example .env

USER root

ENV DB_CONNECTION=mysql
ENV DB_HOSTNAME=db
ENV DB_PORT=3306
ENV DB_DATABASE=prevention
ENV DB_USERNAME=root
ENV DB_PASSWORD=root

RUN npm install
RUN php artisan key:generate

EXPOSE 80
CMD ["apache2-foreground"]
