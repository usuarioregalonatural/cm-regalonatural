mkdir -p ../bbdd
chmod 777 ../bbdd
docker stop cm-regalonatural-phpMyAdmin
docker rm  cm-regalonatural-phpMyAdmin
docker stop cm-regalonatural-www
docker rm  cm-regalonatural-www
docker stop cm-regalonatural-bbdd
docker rm  cm-regalonatural-bbdd





docker run -d -p 9071:3306 -v /home/MTTO-TIENDA/cm-regalonatural/bbdd:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=vmsn2004 -e MYSQL_DATABASE=cm-regalonatural -e MYSQL_USER=victor -e MYSQL_PASSWORD=vmsn2004 --name cm-regalonatural-bbdd -h db-cm-regalonatural mysql:5.7 --default-authentication-plugin=mysql_native_password
docker run -d -p 9070:80 -v /home/MTTO-TIENDA/cm-regalonatural:/var/www/html --name cm-regalonatural-www -h cm-regalonatural --link cm-regalonatural-bbdd:db vicsoft01/ubuntu18.04-apache2.2-php7.3.11
docker run -d -p 9072:80 --name cm-regalonatural-phpMyAdmin -h admin-db-cm-regalonatural --link cm-regalonatural-bbdd:db phpmyadmin/phpmyadmin


