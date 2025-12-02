#!/usr/bin/env bash
set -e

# Ajusta Apache para ouvir na porta que o Render define em $PORT
PORT="${PORT:-8080}"
SERVER_NAME="${SERVER_NAME:-localhost}"

sed -i "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80>/:${PORT}>/" /etc/apache2/sites-available/000-default.conf
echo "ServerName ${SERVER_NAME}" > /etc/apache2/conf-available/servername.conf
a2enconf servername >/dev/null 2>&1 || true

exec docker-php-entrypoint "$@"
