#!/usr/bin/env bash

DB_FILENAME=radikalportal.sql.gz

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
echo "update wp_options set option_value='http://dev.radikalportal/' where option_name='home';" | mysql -u root radikalportal
echo "update wp_options set option_value='http://dev.radikalportal/' where option_name='siteurl';" | mysql -u root radikalportal
echo "update wp_users set user_pass=md5('123456');" | mysql -u root radikalportal

# Setup nginx conf
ln -fs /vagrant/dev.radikalportal /etc/nginx/sites-available/
ln -fs /etc/nginx/sites-available/dev.radikalportal /etc/nginx/sites-enabled/
rm -f /etc/nginx/sites-enabled/default

# Last ned wp-cli
curl -sO https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp

# Deaktiver plugins
sudo -u vagrant -i -- wp --path=/var/www/ plugin deactivate w3-total-cache

# Restart nginx
service nginx restart
