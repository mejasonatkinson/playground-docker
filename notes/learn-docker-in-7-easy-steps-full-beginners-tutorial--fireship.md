
# [Learn Docker in 7 Easy Steps - Full Beginner's Tutorial; Fireship](https://www.youtube.com/watch?v=gAkwW2tuIqE)

Not knowing Docker, can make you feel like an imposter.

## What is Docker?

A way to package software to run on any hardware.

Docker is made up of 3 fundamentals

- DOCKERFILE
- IMAGE
- CONTAINER

The DOCKERFILE is a BLUEPRINT for creating a IMAGE.

The IMAGE is a TEMPLATE for running a CONTAINER.

The CONTAINER is just a running process.

The whole point of docker is to reproduce the same enviroment for everyone running the code.

The developer who creates the software can define the enviroment by creating a DOCKERFILE.

Then any developer can re-use the DOCKERFILE to rebuild the enviroment as a IMAGE.

IMAGES, can be uploaded to the cloud in private or public registries.

## Installing

Docker Desktop

Docker Extension; for VS Code

`docker ps` shows all the running containers on your system.

The Dockerfile


````
FROM node:12
# Sets the base enviroment for the docker image
# Layer 1

WORKDIR /app
# ?
# Layer 2

COPY package*.json ./
# copy from/to
# from: package*.json
# to: ./
# Layer 3

RUN npm install
# SHELL FORM
# Layer 4

COPY . .
# Layer 5

ENV PORT=8080
# Layer 6

EXPOSE 8080
# Layer 7

CMD ["npm", "start"]
# EXEC FORM
# Layer 8
````

.dockerignore

Works simlar to .gitignore

## Building an image

`docker build -t username/demoapp:1.0 .`

use `-t` to name your image.
the convention for naming is:
user name, app name, version

## Create a container

`docker run b909406d737c`

`docker run -p 5000:8080 b909406d737c`

LOCAL: 5000
CONTAINER: 8080

## Create a volume

There might be a scenario where containers need to interact with each other.

The perfered method to deal with this is by using volumes.

`docker volume create shared-stuff`

...

## How to Debug?

Docker Desktop alows you to view logs from inside of the container.

## Docker Compose

BEST PRACTISE: each CONTAINER should only run 1 PROCESS. So you might need to run multiple docker CONTAINERS at the same time.

Create a 'docker-compose.yml' file.

````
version: '3'
services:
    web:
        build: .
        ports:
            - "8080:8080"
        db:
            image: "mysql"
            environment:
                MYSQL_ROOT_PASSWORD: password
            volumes:
                - db-data:/foo
volumes:
    db-data:
````

When the config is set, you can run `docker-compose up` which will find the 'docker-compose.yml' file and run it.

When finished you can just run `docker-compose down`
