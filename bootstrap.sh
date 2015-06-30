#!/usr/bin/env bash

DB_FILENAME=radikalportal.sql.gz
NGINX_CONF_FILENAME=radikalportal.no

export DEBIAN_FRONTEND=noninteractive

apt-get update
apt-get install -q -y nginx mysql-server php5-gd php5-mysql php5-fpm php5-cli

if ! [ -L /var/www ]; then
    rm -rf /var/www
    ln -fs /vagrant/radikalportal /var/www
fi

# Import db
echo "drop database if exists radikalportal; create database radikalportal;" | mysql -u root
cat /vagrant/$DB_FILENAME | gzip -d | mysql -u root radikalportal

# Setup db
echo "update wp_options set option_value='http://dev.radikalportal.no/' where option_name='home';" | mysql -u root radikalportal
echo "update wp_options set option_value='http://dev.radikalportal.no/' where option_name='siteurl';" | mysql -u root radikalportal
echo "update wp_users set user_pass=md5('123456');" | mysql -u root radikalportal

# Setup nginx conf
ln -fs /vagrant/$NGINX_CONF_FILENAME /etc/nginx/sites-available/
ln -fs /etc/nginx/sites-available/$NGINX_CONF_FILENAME /etc/nginx/sites-enabled/
rm -f /etc/nginx/sites-enabled/default

# Restart nginx
service nginx restart
