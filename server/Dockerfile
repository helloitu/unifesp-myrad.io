FROM php:8.2-fpm-alpine

RUN apk update && \
    apk upgrade && \
    apk add --upgrade --no-cache --virtual=build-dependencies \
        build-base \
        curl-dev \
        libxslt-dev \
        libxml2-dev \
        libogg-dev \
        linux-headers\
        libvorbis-dev \
        libtheora-dev \
        speex-dev \
        openssl-dev && \
    apk add --upgrade --no-cache --virtual=base \
        curl \
        libxslt \
        libxml2 \
        libogg \
        libvorbis \
        libtheora \
        speex \
        openssl \
        mailcap \
        tzdata

RUN wget https://downloads.xiph.org/releases/icecast/icecast-2.4.4.tar.gz -O /tmp/icecast-2.4.4.tar.gz && \
    tar -xvf /tmp/icecast-2.4.4.tar.gz -C /tmp/ && \
    cd /tmp//icecast-2.4.4 && \
    ./configure \
		--prefix=/usr \
		--localstatedir=/var \
		--sysconfdir=/etc \
		--mandir=/usr/share/man \
		--infodir=/usr/share/info \
		--with-curl && \
    make check && \
    make install && \
    chmod -R 777 /tmp

RUN docker-php-ext-install pdo pdo_mysql sockets

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install
COPY ./run.sh /tmp
RUN chmod +x /tmp/run.sh
ENTRYPOINT ["/tmp/run.sh"]