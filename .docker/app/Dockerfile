FROM php:7.4-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      docker-php-ext-install pcntl && \
      docker-php-ext-install pdo_pgsql && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
      && adduser \
            --disabled-password \
            --shell /sbin/nologin \
            --home /home/appuser \
            --no-create-home \
            --uid 1000 \
            appuser


COPY ./.docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

RUN chown appuser:appuser /var/www
# copy composer (json|lock) files for dependencies layer caching
COPY --chown=appuser:appuser . /var/www
USER appuser:appuser



