#!bin/bash

cp -rf ./temp/wp-config.php /var/www/html/wordpress/
chown -R www-data:www-data /var/www/html/wordpress/

echo "env[WP_DATABASE] = \$WP_DATABASE" >> /etc/php/7.3/fpm/pool.d/www.conf
echo "env[MYSQL_USER] = \$WP_USER" >> /etc/php/7.3/fpm/pool.d/www.conf
echo "env[MYSQL_PASSWORD] = \$WP_PASSWORD" >> /etc/php/7.3/fpm/pool.d/www.conf
echo "listen = 9000" >> /etc/php/7.3/fpm/pool.d/www.conf

mkdir -p /run/php/

exec php-fpm7.3 -F