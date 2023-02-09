#!/bin/bash
apt update
apt install docker
apt install docker-compose

ip=$(ip a | grep "ens33" | grep -oP "[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}" | grep -v ".255")
cat ./login-docker/db.php | sed "s/ip.addr/$ip/g"
cat ./registro-docker/db.php | sed "s/ip.addr/$ip/g"
cat ./wordpress-docker/public_html/wp-config.php | sed "s/ip.addr/$ip/g"
