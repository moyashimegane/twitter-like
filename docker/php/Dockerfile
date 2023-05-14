# ベースイメージの設定
FROM php:8.1-fpm

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# 作成した設定ファイルをコンテナ内にコピー
COPY php.ini /usr/local/etc/php/

# パッケージのインストール
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    vim \
    && docker-php-ext-install zip pdo_mysql opcache

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

# コンテナ内で作業する際のカレントディレクトリの指定
WORKDIR /var/www

# コンポーザーをイメージに追加
COPY --from=composer /usr/bin/composer /usr/bin/composer

# rootでのインストール許可
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer global require "laravel/installer"

# Laravelプロジェクト作成
WORKDIR /var/www
RUN composer create-project --prefer-dist laravel/laravel twitter-like "10.*"
