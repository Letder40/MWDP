#!/bin/bash
apt update
apt install docker
apt install docker-compose
docker pull instrumentisto/nmap 
read -p "ip pública : " ip_pub 
docker run --rm -it instrumentisto/nmap -sS --min-rate 5000 -p- --open -vvv -Pn -n $ip_pub > ports
ports=$(cat ports | grep "Discovered" | awk '{print $4}' | sed 's/\/tcp//g' | xargs | sed 's/ /,/g')  
docker run --rm -it instrumentisto/nmap -sVC -p$ports $ip_pub 

