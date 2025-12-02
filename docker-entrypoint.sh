#!/usr/bin/env bash
set -e

# Ajusta Apache para ouvir na porta que o Render define em $PORT
PORT="${PORT:-8080}"
SERVER_NAME="${SERVER_NAME:-localhost}"
RUNTIME_DB_PATH="${DATABASE_PATH:-/tmp/ci-data/codeigniter.db}"

sed -i "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80>/:${PORT}>/" /etc/apache2/sites-available/000-default.conf
echo "ServerName ${SERVER_NAME}" > /etc/apache2/conf-available/servername.conf
a2enconf servername >/dev/null 2>&1 || true

# Garante que o SQLite fique em local gravável (Render usa filesystem imutável da imagem)
mkdir -p "$(dirname "${RUNTIME_DB_PATH}")"
chown www-data:www-data "$(dirname "${RUNTIME_DB_PATH}")" 2>/dev/null || true
chmod 775 "$(dirname "${RUNTIME_DB_PATH}")" 2>/dev/null || true
if [ ! -f "${RUNTIME_DB_PATH}" ]; then
	if [ -f /var/www/html/application/database/codeigniter.db ]; then
		cp /var/www/html/application/database/codeigniter.db "${RUNTIME_DB_PATH}"
	fi
fi
chown www-data:www-data "${RUNTIME_DB_PATH}" 2>/dev/null || true
chmod 664 "${RUNTIME_DB_PATH}" 2>/dev/null || true

exec docker-php-entrypoint "$@"
