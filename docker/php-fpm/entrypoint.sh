#!/bin/sh

chgrp -R www-data storage bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache

composer install

php /var/www/html/artisan key:generate
php /var/www/html/artisan config:cache

php-fpm
