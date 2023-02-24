# [Docker Compose will BLOW your MIND!! (a tutorial)](https://www.youtube.com/watch?v=DM65_JyGxCo)

- Docker Knowledge (link: https://www.youtube.com/watch?v=eGz9DS-aIeY)
- Linux Knowledge
    - Ubuntu Desktop
        - Virtual box (link: https://www.youtube.com/watch?v=wX75Z-4MEoM) WATCH

Open up terminal

`sudo apt update`
enter password
`sudo apt install docker.io docker-compose -y`

`sudo docker run --name web -itd -p 8080:80 nginx`

new terminal

`mkdir coffertime`

`cd coffertime`

`nano docker-compose.yaml`

````
version: "3"
services:
    website:
        image: nginx
        ports:
            - "8081:80"
        restart: always
````

`ctrl+x` Exit `y` Save `enter`

`sudo docker-compose up -d`
enter password
`sudo docker ps`
`sudo docker-compose ps`

localhost:8081

`sudo docker-compose down`

`sudo docker-compose stop`

`sudo docker network create coffee --subnet 192.168.92.0/74`

or

`nano docker-compose.yaml`

````
version: "3"
services:
    website:
        image: nginx
        ports:
            - "8081:80"
        restart: always
    website2:
        image: nginx
        ports:
            - "8082:80"
        restart: always
        networks:
            coffee:
                ipv4_address: 192.168.92.21
networks:
    coffee:
        ipam:
            driver: default
            config:
                subnet: "192.168.92.0/74"
````

`ctrl+x` Exit `y` Save `enter`

`sudo docker-compose up -d`

`sudo docker-compose ps`

`sudo docker network ls`

`sudo docker iect coffeetime_`

Wordpress with docker-compose

(frontend(php))(database(mysql))

`mkdir wordpress`

`cd wordpress/`

`nano docker-compose.yaml`

````
version: "3"
services:
    wordpress:
        image: wordpress
        ports:
            - "8089:80"
        depends_on:
            - mysql
        environment:
            WORDPRESS_DB_HOST: mysql
            WORDPRESS_DB_USER: root
            WORDPRESS_DB_PASSWORD: "coffe"
            WORDPRESS_DB_NAME: wordpress
        networks:
            ohyeah:
                ipv4_address: 10.56.1.21
    mysql:
        image: "mysql:5.7"
        environment:
            MYSQL_DATABASE: wordpress
            MYSQL_ROOT_PASSWORD: "coffee"
        volumes:
            - ./mysql:/var/lib/mysql
        networks:
            ohyeah:
                ipv4_address: 10.56.1.20
networks:
    ohyeah:
        ipam:
            driver: default
            config:
                subnet: "10.56.1.0/74"

````

`ctrl+x` Exit `y` Save `enter`

`sudo docker-compose up -d`

`sudo docker-compose ps`

localhost:8089

`ls`

`sudo docker-compose down`

`sudo docker-compose up -d`

the database will still be there

`mkdir hackinglab`

`cd hackinglab`

...

vulhub?

docker/awesome-docker