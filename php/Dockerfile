FROM php:8.0-apache
RUN apt update \
    && apt install -y zip git libpq-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring \
    && pecl install xdebug && docker-php-ext-enable xdebug
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
