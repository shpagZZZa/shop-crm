FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /app/

# Set working directory
WORKDIR /app/

# Install dependencies
RUN apt-get update && apt-get install -y \
    libmcrypt-dev \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install mysqli tokenizer pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /app

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
