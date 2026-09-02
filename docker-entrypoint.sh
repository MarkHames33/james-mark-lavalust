#!/bin/sh
set -eu

PORT="${PORT:-10000}"
sed -ri "s#^Listen .*#Listen 0.0.0.0:${PORT}#" /etc/apache2/ports.conf
sed -ri "s#<VirtualHost [^>]+>#<VirtualHost *:${PORT}>#" /etc/apache2/sites-available/000-default.conf

exec apache2-foreground