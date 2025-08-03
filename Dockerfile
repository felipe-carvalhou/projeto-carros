# Use a imagem base do PHP
FROM php:8.2-cli

# Instale dependências e extensões
RUN apt-get update && \
    apt-get install -y libpq-dev libzip-dev unzip git && \
    docker-php-ext-install pdo_pgsql zip

# Copie o script de inicialização
COPY start.sh /start.sh

# Dê permissão de execução
RUN chmod +x /start.sh

# Comando de inicialização
CMD ["/start.sh"]

# Exponha a porta
EXPOSE 8000
