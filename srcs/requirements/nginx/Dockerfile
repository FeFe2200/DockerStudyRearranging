FROM debian:buster

RUN apt-get -y update

RUN apt-get -y install nginx

RUN apt-get -y install openssl

RUN openssl req -newkey rsa:4096 -days 365 -nodes -x509 -subj "/C=KR/ST=Seoul/L=Seoul/O=42Seoul/OU=FREE/CN=localhost" -keyout localhost.dev.key -out localhost.dev.crt
RUN mv localhost.dev.crt etc/ssl/certs/
RUN mv localhost.dev.key etc/ssl/private/
RUN chmod 600 etc/ssl/certs/localhost.dev.crt etc/ssl/private/localhost.dev.key

RUN rm etc/nginx/sites-available/default

ADD ./conf/nginx.conf etc/nginx/sites-available/

RUN cp etc/nginx/sites-available/nginx.conf etc/nginx/sites-available/default
RUN rm etc/nginx/sites-available/nginx.conf

EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]