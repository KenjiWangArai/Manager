# # FROM php:7.0.23-fpm

# # RUN apt-get update && apt-get install -y libmcrypt-dev \
# #     mysql-client libmagickwand-dev --no-install-recommends \
# #     && pecl install imagick \
# #     && openssl \
#     && docker-php-ext-enable imagick \
#     && docker-php-ext-install mcrypt pdo_mysql bcmath \
#     && docker-php-ext-install pdo_mysql\

FROM php:7.2-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql\