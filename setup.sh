#!/bin/bash
apt update -y
apt install docker -y 
apt install docker-compose -y
apt install xclip -y
apt install moreutils -y
apt install git -y
apt install apache2 -y
apt install php -y

systemctl start apache2 && systemctl enable apache2
rm /var/www/html/index.html
git clone --depth 1 https://github.com/afaqurk/linux-dash.git
cpath=$(pwd)
ln -s $cpath/linux-dash/app /var/www/html/linux-dash

clear

ip=$(ip a | grep "eth0" | grep -oP "[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}" | grep -v ".255")
ip_pub=$(curl -s ipconfig.io)

cat ./login-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./login-docker/public_html/db.php 
cat ./login-docker/public_html/index.php | sed "s/ip_pub.addr/$ip_pub/g" | sponge ./login-docker/public_html/index.php

cat ./registro-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./registro-docker/public_html/db.php
cat ./registro-docker/public_html/index.php | sed "s/ip_pub.addr/$ip_pub/g" | sponge ./registro-docker/public_html/index.php 


echo "<?php header('Location: http://$ip_pub:8080');" > /var/www/html/index.php
bash autodocker.sh build


cd login-docker
docker-compose up --no-start

cd ../registro-docker 
docker-compose up --no-start

cd ..
bash autodocker.sh start

sleep 5 

mysqlID=$(docker container ls | grep "mysql" | awk '{print $1}')
docker cp ./databases.sql $mysqlID:/databases.sql  
docker exec -it $mysqlID mysql -u root -p -e "source databases.sql;"

clear && echo "El entorno de trabajo esta listo para el escaneo"
