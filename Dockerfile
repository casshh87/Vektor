# Используйте официальный образ PHP
FROM php:8.3-fpm

# Установите необходимые расширения
#RUN docker-php-ext-install pdo_mysql

# Установите Composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установите рабочую директорию внутри контейнера
WORKDIR /app

# Копируйте исходный код вашего приложения в контейнер
COPY . /app

# Запустите встроенный веб-сервер PHP
CMD ["php", "-S", "0.0.0.0:8080"]
