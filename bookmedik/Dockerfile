FROM debian:bullseye
MAINTAINER davidrgfoss "davidrg@davidrgfoss.com"
RUN apt-get update && apt-get upgrade -y && apt-get install apache2 libapache2-mod-php php php-mysql wget mariadb-client -y
COPY bookmedik /var/www/html/
COPY mkbd.sh /opt/
RUN chmod +x /opt/mkbd.sh && rm /var/www/html/index.html
CMD ["/opt/mkbd.sh"]
