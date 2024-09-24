# Usar a imagem oficial do PHP 8.2 com Apache
FROM php:8.2-apache

# Definir o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo mbstring zip exif pcntl gd

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Habilitar o módulo Apache Rewrite para Laravel
RUN a2enmod rewrite

# Copiar os arquivos da aplicação Laravel para dentro do container
COPY . /var/www/html

# Definir permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Expor a porta 80 para o Apache
EXPOSE 80

# Executar o Composer para instalar as dependências
RUN composer install

# Definir o ponto de entrada padrão (start do Apache)
CMD ["apache2-foreground"]
