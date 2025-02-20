# Используем официальный образ PHP с поддержкой FPM
FROM php:8.2-fpm

# Устанавливаем необходимые пакеты для работы с PostgreSQL и Composer
RUN apt-get update && apt-get install -y \
    libpq-dev \
    curl \
    gnupg \
    unzip \
    zlib1g-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer \
    && composer --version  # Проверяем, что Composer установлен

# Установка Node.js и npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем файлы проекта
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install --no-dev --optimize-autoloader

# Устанавливаем зависимости NPM
RUN npm install && npm run build

# Даем права на storage и cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Запускаем PHP-FPM
CMD ["php-fpm"]
