# [Intro to Docker - Part 2 (Networking, Docker Compose); JetBrains](https://www.youtube.com/watch?v=_m9JYAvFB8s)

[ App        ] ( MySQL )
[ App Server ]
[ JVM        ]
[ OS         ]
[ Hardware   ]

Creating a Database Container

`docker pull mysql`

`docker run --name app-db -d -e MYSQL_ROOT_PASSWORD=password -e MYSQL_DATABASE=myDB mysql`

`docker ps`

`docker logs app-db` 

Database data is deleted when the container is destoryed UNLESS you store that data in volumns...

Creating a Application Container

inside the Dockerfile

```
FROM tomcat:10-jdk11
ADD target/MyWebApp.war /usr/local/tomcat/webapps/MywebApp.war
CMD ["cataline.sh", "run"]
```

At the point you can run this.. BUT this wont work because docker is isolated.

Docker, is like a ship not knowing what is inside of the container.

We need to expose the port to docker and publish to a port on the host machine.


This exposes the port to docker:

```
FROM tomcat:10-jdk11
ADD target/MyWebApp.war /usr/local/tomcat/webapps/MywebApp.war
EXPOSE 8080
CMD ["cataline.sh", "run"]
```

`docker rm -f`

`docker --help`

`docker run --name app -d -p 8080:8080 my-web-app:1.0`

`docker run --name app -d -p 8081:8080 my-web-app:1.0`

Its always: `host:container`

`docker ps` shows for port bindings

Communicating between containers, at this step wont work...

Networking in Docker (Bridge Networks)

`docker network create app-network` Best to create a network rather than running on a default network.

`docker network ls`

`docker network connect app-network app-db`

lost at 21:00...

Docker Compose

docker-compose.yml

```
version: "3"
services:
    app-db:
        image: mysql
        environment:
            - MYSQL_ROOT_PASSWORD=password
            - MYSQL_DATABASE=myDB
    app:
        build: .
        ports:
            - "8080:8080"
        depends_on:
            - app-db
```

`docker-compose up -d`
