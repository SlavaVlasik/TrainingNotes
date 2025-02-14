# Используем официальный образ PHP с поддержкой FPM
FROM php:8.2-fpm

# Устанавливаем необходимые пакеты для PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Копируем файлы проекта внутрь контейнера
WORKDIR /var/www
COPY . .

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем зависимости Laravel
RUN composer install --no-dev --optimize-autoloader
