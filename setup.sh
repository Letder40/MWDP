#!/bin/bash
apt update
apt install docker
apt install docker-compose
apt install moreutils

ip=$(ip a | grep "eth0" | grep -oP "[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}" | grep -v ".255")
cat ./login-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./login-docker/public_html/db.php 
cat ./registro-docker/public_html/db.php | sed "s/ip.addr/$ip/g" | sponge ./registro-docker/public_html/db.php 
cat ./wordpress-docker/public_html/wp-config.php | sed "s/ip.addr/$ip/g" | sponge ./wordpress-docker/public_html/wp-config.php

bash autodocker.sh build
bash autodocker.sh up &>/dev/null
bash autodocker.sh stop &>/dev/null 
bash autodocker.sh start
