# Usar a imagem oficial do PHP com Apache e extensões necessárias
FROM php:8.2-apache

# Instalar dependências do sistema, PHP extensions e Composer
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_pgsql zip

# Ativar mod_rewrite do Apache
RUN a2enmod rewrite

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar o código para dentro do container
COPY . /var/www/html

# Definir diretório de trabalho
WORKDIR /var/www/html

# Instalar dependências PHP via Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expor porta padrão do Apache
EXPOSE 80

# Rodar migrations aqui é opcional — melhor rodar manualmente depois
# RUN php artisan migrate --force

# Start Apache em foreground
CMD ["apache2-foreground"]
