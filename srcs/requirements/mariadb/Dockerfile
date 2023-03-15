FROM debian:buster

RUN apt-get update
RUN apt-get -y install mariadb-server

RUN mkdir -p /temp

COPY ./conf/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf
COPY ./conf/my.cnf /etc/mysql/my.cnf

COPY ./tools/wordpress.sql ./wordpress.sql
COPY ./tools/db_init.sh ./db_init.sh
RUN chmod +x ./db_init.sh

EXPOSE 3306

ENTRYPOINT ["sh", "./db_init.sh"]