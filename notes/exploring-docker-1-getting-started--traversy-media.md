# [Exploring Docker [1] - Getting Started; Traversy Media](https://www.youtube.com/watch?v=Kyx2PsuwomE)

The point of Docker is to run applications/software inside of containers.

Compare:

VM / VMWARE / HYPERVISOR WAY

[app] [app] [app]
[os ] [os ] [os ]
[vm ] [vm ] [vm ]
[server         ]

-TO-

DOCKER / CONTAINERS WAY

[app      ] [app      ] [app      ]
[container] [container] [container]
[os                               ]
[server                           ]

docker.com

skips over installation...

create a docker account

when fully installed you can run `docker` in the terminal to make sure it is working, and see all the commands/sub-commands.

`docker version`
Server: is the Engine,
Client: is the way we communicate with the Server/Engine.

Built on the Go programming language.

Ceate a basic nginx container

`docker container run -it -p 80:80 nginx`

`-it` is interactive

`-p` is for port mapping, and should be followed by a space and 2 numbers `80:80`.

The first `80` is the port your computer will receive the container on.
The second `80` is the port your exposing inside of the container and will depend on the type of container/software you are using. nginx's default is `80`.

`nginx` refers to the docker image we want to use.

When run it might say: `Unable to find image 'nginx:latest' locally` this means it wasn't able to find a version of the container with the tag `latest` stored on your local machine; so instead it Pulls the image from docker hub.

When complete go to `localhost` or `localhost:80` in a browser and nginx should be running.

hub.docker.com

search `nginx`

`ctrl`+`c`

`docker container ls` shows the running containers on the system

`docker container ls -a` shows all containers on the system

To delete a container you can run `docker container rm 95a` the `95a` refers to the first 3 characters of the docker containers ID, which is visible when you run the `docker container ls` commands.

`docker images` shows the images on the system, deleting a container does not delete the image.

To delete a image you can run `docker image rm c82` the `c82` refers to the first 3 characters of the docker image ID, which is visible when you run the `docker images` command.

You can also pull images down from docker hub such as nginx without creating a docker container by running `docker pull nginx`. Running `docker images` will show that the image is back on your system.

`docker container run -d -p 8080:80 --name mynginx nginx`

`-d` is detached; meaning you can continue using the terminal.

`--name` allows you to assign a name to your container in this instance: `mynginx`.

As said before `docker container ls` shows the running containers on the system. `docker ps` does the same; you can also use `docker ps -a` to see all of the containers on the system.

`docker container run -d -p 8081:80 --name myapache httpd`

The officail docker image for apache is called `httpd`?

The first `8081` is the port your computer will receive the container on.
The second `80` is the port your exposing inside of the container and will depend on the type of container/software you are using. apache's default is `80`.

`docker ps` will show that the container is running.

Go `localhost:8081` in a browser and apache should be running.

`docker container run -d -p 3306:3306 --name mysql --env MYSQL_ROOT_PASSWORD=123456 mysql`

The first `3306` is the port your computer will receive the container on.
The second `3306` is the port your exposing inside of the container and will depend on the type of container/software you are using. mysql's default is `3306`.

`--env` is used for setting enviroment variables.

`MYSQL_ROOT_PASSWORD=123456` is a image/enviroment specific variable. `123456` is just an example for the password, this could be anything.

`docker ps` shows that the container is running.

`docker container stop mysql` will stop running the `mysql` container; but will not delete the container `docker ps -a` shows that it is still there.

To remove a container that is running, you can run the command `docker container rm myapache -f`

`-f` will force remove the container.

How do we see the files within the container?

`docker container exec -it mynginx bash` will allow you to access the bash for the mynginx container. (Only for Mac)

`ls` will show all the folders/files

`cd usr/share/nginx/html` is where the files which get exposed on the port live.

`ls`

`exit` to exit out of the container/program.

For more/Common cammands, you can review Brads [Docker Commands, Help & Tips File](https://gist.github.com/bradtraversy/89fad226dc058a41b596d586022a9bd3) on GitHub.

`docker rm $(docker ps -aq) -f` will delete all containers.

How do we edit files?

We MAP the area within the container(`usr/share/nginx/html`) to an area on your computer using volumns.

How is this done?

`docker container run -d -p 8080:80 -v $(pwd):/usr/share/nginx/html --name nginx-website nginx`

`$(pwd)` for current directory. (Only for Mac)

`/usr/share/nginx/html` what content inside of the container will be visible in the current directory to edit.

`ls` nothing will appear, because nothing is inside this directory.

`code .` to open up code editor

Create a new file called `index.html`, and this will update and be visible on `localhost:8080`.

`Dockerfile`

```
FROM nginx:latest
WORKDIR /usr/share/nginx/html
COPY . .
```

In the terminal in the directory your created the dockerfile id in run: `docker image build -t username/projectname .` this will create the docker image.

The `.` is refering to the Dockerfile being in the current directory.

`docker images` will show the image.

`docker container ls`
`docker container rm nginx-website -f` clear/delete container.

`docker container run -d -p 8082:80 username/projectname`
`docker ps`

Now the container is visible on `localhost:8082`

`docker push username/projectname` to push images up to Docker Hub.
`docker login` IF required.
