# Usar a imagem oficial do PHP 7.4 com Apache
FROM php:7.4-apache

# Instalar dependências para o mysqli
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli

# Habilitar o módulo mysqli no PHP
RUN docker-php-ext-enable mysqli

# Expor a porta do Apache
EXPOSE 80

# Copiar o código-fonte do seu aplicativo para o contêiner
COPY . /var/www/html/

# Habilitar o módulo de reescrita do Apache (caso necessário)
RUN a2enmod rewrite

# Comando para rodar o Apache
CMD ["apache2-foreground"]
