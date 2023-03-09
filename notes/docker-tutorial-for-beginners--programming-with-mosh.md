# [Docker Compose Tutorial](https://www.youtube.com/watch?v=HG6yIjZapSA)

part of the ultimate docker course

Running Multi-container Apps

- Docker Compose
- Docker Networking
- Database migrations
- Running automated tests

Install Docker Compose

`docker-compose --version`

1.28.5

Clearing Up our Workspace

docker image ls

docker image ls -q

docker container rm -f $(docker container ls -a -q)

docker image rm -f $(docker image ls -a -q)

docker images

docker ps

docker ps -A

docker desktop - preferences - troubleshoot icon(bug) - Clean / Purge Database

The Sample Web Application


/backend
    Dockerfile
/frontend
    Dockerfile
docker-compose.yml

`docker-compose up`

migration script for auto populating the database with content...

yaml format...

JSON and YAML formats

data.json (faster)
{
    "name": "The Ultimate Docker Course",
    "price": 149,
    "is_published": true,
    "tags": ["software", "devops"],
    "author": {
        "first_name": "Mosh",
        "last_name": "Hamedani"
    }
}

data.yml (slower)
---
name: The Ultimate Docker Course
price: 149
is_published: true
tags: 
    - software
    - devops
author:
    first_name: Mosh
    last_name: Hamedani

Creating a Compose File


docker-compose.yml

version: check docker compose file; compose specification,
services:
    serviceName: can be any name....
        build: build a image from a Dockerfile
        image: pull a image from docker hub
        ports: port mapping
        volumes: to set where code is stored
volumes:
    volumeLocation: THIS NEEDS TO BE SET TO WORK....

see docker compose references

version: "3.8"
services:
    web:
        build: ./frontend
        ports:
            - 3000:3000
    api:
        build: ./backend
        ports:
            - 3001:3001
        environment:
            DB_URL: mongodb://db/vidly
    db:
        image: mongo:4.0-xenial
        ports:
            - 27017:27017
        volumes:
            - vidly:/data/db
volumes:
    vidly:


Build images

docker-compose

will list all the options you have for docker-compose

docker-compose build --help

docker-compose build

docker images

docker-compose build --no-cache

docker images

Starting and Stopping the Application

docker-compose up --help
docker-compose up --buikd
docker-compose up -d

docker-compose ps

docker-compose down

Docker Networking

docker-compose up -data
docker network ls

docker ps

docker exec -it 8c6 sh ???
ping api
ping: permission denied (are you root?)
exit

docker exec -it -u root 8c6 sh ???

ping api

ctrl + c

DNS Server

Container > DNS Resolver ???

ifconfig

MongoDB Compass ???