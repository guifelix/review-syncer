FROM edersondev/php7

RUN apt-get update && apt-get install -y cron git

RUN service cron start
WORKDIR /var/www/html
