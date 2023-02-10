#!/bin/bash
apt update -y
apt install docker -y 
apt install docker-compose -y
apt install moreutils -y
clear

ip=$(ip a | grep "eth0" | grep -oP "[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}" | grep -v ".255")
cat ./login-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./login-docker/public_html/db.php 
cat ./registro-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./registro-docker/public_html/db.php 
cat ./wordpress-docker/public_html/wp-config.php | sed "s/ip.addr/$ip/g" | sponge ./wordpress-docker/public_html/wp-config.php

bash autodocker.sh build

cd ./wordpress-docker/ 
docker-compose up 
kill $!

cd ./login-docker
docker-compose up
kill $! 

cd ./registro-docker 
docker-compose up 
kill $!

bash autodocker.sh start
