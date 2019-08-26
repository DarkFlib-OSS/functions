#!/bin/sh

echo "Installing PHP extensions"

# Add your extensions in here, an example is below
# docker-php-ext-install mysqli
#
# See the template documentation for instructions on installing extensions;
# - https://github.com/openfaas/templates/tree/master/template/php7
#
# You can also install any apk packages here

echo "Installing function dependencies"
cd /home/app/function
curl -o GeoLite2-City.tar.gz http://geolite.maxmind.com/download/geoip/database/GeoLite2-City.tar.gz
tar -xvzf GeoLite2-City.tar.gz --strip 1

