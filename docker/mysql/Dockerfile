FROM mysql:5.7

COPY ./init.sql /docker-entrypoint-initdb.d/

RUN chmod 644 /docker-entrypoint-initdb.d/init.sql