FROM ubuntu:22.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
 && apt-get install -y locales \
 && locale-gen en_US.UTF-8
ENV LANG=en_US.UTF-8 LANGUAGE=en_US:en LC_ALL=en_US.UTF-8

RUN apt-get update && apt-get install -y \
      ca-certificates apt-transport-https lsb-release gnupg2 \
      software-properties-common \
      curl zip unzip git supervisor \
 && add-apt-repository -y ppa:ondrej/php \
 && apt-get update \
 && apt-get install -y --no-install-recommends \
      php8.2-cli php8.2-common php8.2-mysql php8.2-gd php8.2-pgsql \
      php8.2-imap php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-soap \
 && apt-get purge -y software-properties-common \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# ВАЖНО: копируем именно в файл
COPY ./php.ini /etc/php/8.2/cli/php.ini
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord", "-n"]
