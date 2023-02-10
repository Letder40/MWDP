#!/bin/bash
apt update -y
apt install docker -y 
apt install docker-compose -y
apt install moreutils -y
clear

ip=$(ip a | grep "eth0" | grep -oP "[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}" | grep -v ".255")
ip_pub=$(curl ipconfig.io)

cat ./login-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./login-docker/public_html/db.php 
cat ./login-docker/public_html/index.php | sed "s/ip_pub.addr/$ip_pub/g" | sponge ./login-docker/public_html/index.php

cat ./registro-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./registro-docker/public_html/db.php
cat ./registro-docker/public_html/db.php | sed "s/ip_pub.addr/$ip_pub/g" | sponge ./registro-docker/public_html/index.php 

cat ./wordpress-docker/public_html/wp-config.php | sed "s/ip.addr/$ip/g" | sponge ./wordpress-docker/public_html/wp-config.php
cat ./wordpress-docker/public_html/wp-config.php | sed "s/ip_pub.addr/$ip_pub/g" | sponge ./wordpress-docker/public_html/wp-config.php

bash autodocker.sh build


cd ./wordpress-docker/ 
docker-compose up 

cd ../login-docker
docker-compose up 

cd ../registro-docker 
docker-compose up 

cd ..
bash autodocker.sh start 
mysqlID=$(docker container ls | grep "mysql" | awk '{print $1}')
docker cp ./databases.sql $mysqlID:/databases.sql  
docker exec -it $mysqlID mysql -u root -p -e "source databases.sql;"


