FROM debian:buster

RUN apt-get -y update

RUN apt-get -y install php7.3-fpm
RUN apt-get -y install php-mysql
RUN apt-get -y install tar
RUN apt-get -y install wget

RUN wget https://wordpress.org/latest.tar.gz

RUN tar xzvf latest.tar.gz

COPY ./tool/php_setting.sh /temp/
COPY ./conf/wp-config.php /temp/

RUN chmod 766 ./temp/php_setting.sh

RUN rm -rf latest.tar.gz
RUN mkdir  -p /var/www/html/
RUN mv -f /wordpress/ /var/www/html/

EXPOSE 9000

CMD ["sh", "./temp/php_setting.sh"]