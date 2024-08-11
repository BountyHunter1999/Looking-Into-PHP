FROM php:fpm-alpine

LABEL author="Shrish"
LABEL description="This is a sample docker image to use for php"

ENV PORT=4002

RUN apk update && apk add --no-cache oniguruma-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring

WORKDIR /app

COPY . .

EXPOSE ${PORT}

# CMD [ "php", "-S", '0.0.0.0:"${PORT}"' ]
CMD [ "/bin/sh", "-c", "php -t public -S 0.0.0.0:${PORT}" ]