FROM php:8.2-apache

ENV CI_ENV=production

# Ativa rewrite e permite .htaccess para roteamento limpo
RUN a2enmod rewrite \
	&& sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copia aplicação
COPY . /var/www/html

# Entry-point ajusta a porta do Apache com base no $PORT (Render)
COPY docker-entrypoint.sh /usr/local/bin/custom-entrypoint.sh
RUN chmod +x /usr/local/bin/custom-entrypoint.sh

EXPOSE 8080

ENTRYPOINT ["custom-entrypoint.sh"]
CMD ["apache2-foreground"]
