#!/usr/bin/env bash
set -e

# Ajusta Apache para ouvir na porta que o Render define em $PORT
PORT="${PORT:-8080}"
sed -i "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80>/:${PORT}>/" /etc/apache2/sites-available/000-default.conf

exec docker-php-entrypoint "$@"
