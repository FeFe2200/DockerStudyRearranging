#!/bin/sh
service mysql start;
cat /var/lib/mysql/.setup 2> /dev/null

if [ $? -ne 0 ]; then
mysql -e "CREATE DATABASE IF NOT EXISTS $MYSQL_DATABASE";
mysql -e "CREATE USER IF NOT EXISTS '$MYSQL_USER'@'%' IDENTIFIED BY '$MYSQL_PASSWORD'";
mysql -e "GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%'";
mysql -e "ALTER USER '$MYSQL_ROOT'@'localhost' IDENTIFIED BY '$MYSQL_ROOT_PASSWORD'; FLUSH PRIVILEGES;"
mysql $WP_DATABASE -u$MYSQL_ROOT -p$MYSQL_ROOT_PASSWORD  < ./wordpress.sql

touch /var/lib/mysql/.setup
fi

mysqladmin -u$MYSQL_ROOT -p$MYSQL_ROOT_PASSWORD shutdown

exec mysqld