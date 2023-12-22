# Utilisation de l'image PHP avec Apache
FROM php:8.2-apache

# Configuration d'Apache pour éviter les avertissements de ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Créer le répertoire des logs
RUN mkdir -p /var/log/apache2

# Ajuster les permissions du répertoire des logs
RUN chown -R www-data:www-data /var/log/apache2

# Mise à jour des référentiels et installation des dépendances
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    locales \
    apt-utils \
    git \
    libicu-dev \
    g++ \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    libxslt-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Configuration des paramètres régionaux
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen \
    && locale-gen

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    && mv composer.phar /usr/local/bin/composer

# Téléchargement et installation de Node.js et NPM
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Installation du CLI Symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin

# Configuration et installation des extensions PHP
RUN docker-php-ext-configure intl \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    opcache \
    intl \
    zip \
    calendar \
    dom \
    mbstring \
    gd \
    xsl

# Installation de l'extension APCu
RUN pecl install apcu \
    && docker-php-ext-enable apcu

# Installation de Make
RUN apt-get update \
    && apt-get install -y make

# Ajout du répertoire de Make au PATH
ENV PATH="${PATH}:/usr/bin/make"

# Définir le répertoire de travail par défaut
WORKDIR /var/www/SMD_Website