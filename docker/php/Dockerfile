# PHP 8.3(FPM版)をベースにする
FROM php:8.3-fpm

# Composerを使うために必要なツールとNode.jsをインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    ca-certificates \
    gnupg

# Node.js 22(LTS) をインストール（npm / Vite を使用するため）
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# LaravelからMySQLへ接続できるようにする
RUN docker-php-ext-install \
    pdo_mysql \
    zip

# Composerをコピー
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravelを配置する場所
WORKDIR /var/www/html

# PHP設定をコピー
COPY docker/php/php.ini /usr/local/etc/php/php.ini
