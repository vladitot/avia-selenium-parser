FROM selenium-parser_workspace

COPY xdebug.ini /etc/php/7.2/cli/conf.d/xdebug.ini

COPY ./crontab /etc/cron.d

RUN chmod -R 644 /etc/cron.d