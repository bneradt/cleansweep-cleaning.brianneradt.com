FROM php:8.2-fpm-alpine AS php-base

FROM nginx:alpine

# Install PHP and required extensions
RUN apk add --no-cache \
    php82 \
    php82-fpm \
    php82-json \
    php82-openssl \
    php82-curl \
    php82-mbstring \
    && ln -sf /usr/bin/php82 /usr/bin/php

# Configure PHP-FPM
RUN sed -i 's/listen = 127.0.0.1:9000/listen = \/var\/run\/php-fpm.sock/' /etc/php82/php-fpm.d/www.conf \
    && sed -i 's/;listen.owner = nobody/listen.owner = nginx/' /etc/php82/php-fpm.d/www.conf \
    && sed -i 's/;listen.group = nobody/listen.group = nginx/' /etc/php82/php-fpm.d/www.conf \
    && sed -i 's/user = nobody/user = nginx/' /etc/php82/php-fpm.d/www.conf \
    && sed -i 's/group = nobody/group = nginx/' /etc/php82/php-fpm.d/www.conf

# Copy site files
COPY mysite/ /usr/share/nginx/html/
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Create startup script
RUN echo '#!/bin/sh' > /start.sh \
    && echo 'php-fpm82 &' >> /start.sh \
    && echo 'nginx -g "daemon off;"' >> /start.sh \
    && chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
