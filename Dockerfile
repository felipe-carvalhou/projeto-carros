# Imagem PHP oficial com Apache (pode usar só PHP CLI, mas aqui vamos simplificar)
FROM php:8.2-cli

# Instalar dependências do sistema e PHP para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev zip unzip git \
    && docker-php-ext-install pdo_pgsql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar código
WORKDIR /app
COPY . /app

# Instalar dependências do Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ajustar permissões para storage e cache
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Copiar o script de start
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Expor a porta padrão para Laravel serve (não obrigatório mas recomendado)
EXPOSE 8000

# Rodar o script start.sh que inicia o Laravel na porta correta
CMD ["/start.sh"]
