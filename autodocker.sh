#!/bin/bash
wordpress=$( docker container ls | grep "" )

if [[ $1 == "start" ]]; then 
   arg=$1
   echo;
   echo -ne " Inicializando dockers .   \r" && sleep 1
   echo -ne " Inicializando dockers ..  \r" && sleep 1
   echo -ne " Inicializando dockers ... \r" && sleep 1
   echo;  
fi

if [[ $1 == "stop" ]]; then 
   arg=$1
   echo;
   echo -ne " Parando servicios de docker.   \r" && sleep 1
   echo -ne " Parando servicios de docker..  \r" && sleep 1
   echo -ne " Parando servicios de docker... \r" && sleep 1
   echo;  
fi

if [[ $arg == "" ]]; then
   echo " Usa { autodocker start } para lanzar todos los servicios"
   echo " Usa { autodocker stop } para parar todos los servicios"
   exit 1
fi

   cd /root/wordpress-docker
   docker-compose $arg  

   cd /root/login-docker
   docker-compose $arg

   cd /root/registro-docker
   docker-compose $arg

