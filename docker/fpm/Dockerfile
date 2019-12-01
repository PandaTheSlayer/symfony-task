FROM php:7.3-fpm-alpine

RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*

RUN apk add --no-cache --update bash libxml2-dev libzip-dev

RUN docker-php-ext-install pcntl mysqli pdo_mysql mbstring soap bcmath zip

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && mv composer /usr/local/bin/composer
