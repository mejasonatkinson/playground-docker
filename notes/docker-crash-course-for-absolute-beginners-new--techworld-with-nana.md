# [Docker Crash Course for Absolute Beginners [NEW]; TechWorld with Nana](https://www.youtube.com/watch?v=pg19Z8LL06w)

What is Docker?

Why was it created?

What problem does it solve?

Makes developing and deploying applcations much easier.

Packages applications with all the necessary dependencies,
configuration, system tools and runtime.

To make it easier to share and distribute.

Development process before containers?

Each developer needs to install and configure all services directly on their OS; the installation process is different for each OS environment...

And many steps.

With Docker you don't need to install or configure any services directly on the users OS;

Isolated, and Packaged...

All you do is start the service, using a single docker command `docker run postgress`

Before containers, a developer would create an Artifact file along with Installation Instructions for operations.

Textual guides of deployment can be effected by human error or miss communication.

With containers, a developer creates an artifact which includes everything the app needs to work!

No configuration needed on the server.

Virtual Machine vs Docker

How an OS is made up

OS Applications Layer > OS Kernel > HARDWARE

OS Applications Layer (Docker) > OS Kernel > HARDWARE

OS Applications Layer > OS Kernel (Virtual Machine) > HARDWARE

Docker images are much smaller...
Containers take seconds to start...
Docker is not compatible with all OS...

OS Applications Layer [windows] (linux container) > OS Kernel [windows] (no linux kernal?) > HARDWARE

Most containers are Linux based...
Docker was Originally built for Linux OS

Docker Desktop was created to solve this problem on Windows & Mac.
This is done by using a Hypervisor layer; a lightweight linux distro.

Has video on Virtual Machines called [Virtual Machines explained in 15 Mins]()

So for local development you would install Docker Desktop.

Install docker... Follow the officail documentation.

Review: 'What's included in Docker Desktop'
- Docker Engine
    - Server, which manages images & containers
- Docker CLI - Client
    - Allows you to execute docker commands in the command line
- and more....

Docker Images vs Docker Containers

Docker Image, is an executable application artifact includes app source code AND complete environment configuration needed to run.

Docker Container, starts/runs the application

A running instance of an image is a container.

So you can run multiple containers with the same image.

`docker images` will show the docker images.

`docker ps` will show the running containers.

nethopper.com... promo.

Docker Registry

How do we get images?

Docker Registries, is a storage and distribution system for Docker images.

The biggest Docker registry is called Docker Hub.

Docker Official Images;
Docker has a dedicated team responsible for reviewing and publishing all content in the Docker Official Images repositories. Working in collaboration with software maintainers, security experts. however anyone can participate as collaboration takes place openly on GitHub.

Technology changes, in which case docker images are also versioned using image tags, for example `redis:latest`.

How do we download the image...

1. Search nginx on docker hub
2. Pick image tag (1.23)
3. `docker pull nginx:1.23`
4. `docker images` will show the image
5. `docker pull nginx` will always pull the latest
6. `docker run nginx:1.23` will start the container
7. Run `docker ps` in a different terminal, will show the container running.
8. In the orginal terminal, run `ctrl`+`c` to exit out the terminal, and stop the container.
9. `docker run nginx:1.23 -d` will start the container in detached mode, meaning you can still use the terminal to run more commands.
10. `docker ps` will show the container running.
11. `docker logs 88888` will print out the logs for the container `88888` this being the container id of the container.

You don't need to pull and then run. IF a image is not on your local machine docker will auto pull from docker hub to get the image to run.
`docker run nginx:1.22-alpine`

Port Binding

How do we access the content, inside the container?

By default a container is closed/contained/isolated inside the docker network.

We first need to expose the container port to the local network; this is done using port binding.

Different, applications have different default ports.

nginx, default port is 80
redis, default port is 6379

This is also visible when you run `docker ps` under PORTS.

We expose the container, when we create the container.

`docker stop` stops a container

`docker run -d -p 9000:80 nginx:1.23`

`-p 9000:80 ` will expose the port `80` inside the container, and display it in the localhost port of `9000` so when you go to `localhost:9000` you will see the container output.

It is normaly a standard to use the same port for both for example

MySQL, default port is 3306

so you would use `-p 3306:3306`

`docker run`, creates a new container everytime. It does not re-use the previous container.

`docker ps` only shows running containers.

`docker ps -a` shows all containers.

`docker start 8904`, starts an existing container `8904` being the container ID visible when you run `docker ps -a`. You can also stop containers the same way `docker stop 8904`.

Instead of using an ID, you can also use a name, IF the container has a name. You can give the container a name by running: `docker run --name web-app -d -p 9000:80 nginx:1.23` the `--name` flag asigns the name, in this case the name is `web-app`

Public and Private Docker Registries...

All big cloud providers offer private registries: Amazon ECR, Google Container Registry, Nexus, Docker Hub etc...

Registry vs Repository?

Dockerfile - Create own Images

Dockerfile is a definition of what is the image is/does.

Dockerfile is a text document that contains commands to assemble an image.

Docker can then build an image by reading those instructions

We are going to write a nodejs image.

To run a nodejs project inside docker, we will need a 'parent image' / 'base image' which can run nodejs. In a Dockerfile this is done by using the `FROM` command.

To run a nodejs project inside docker, you will need the files/folders of the project. In a Dockerfile this is done by using the `COPY` command.

`COPY package.json /app/` the first value `package.json` is the file/folder to copy, the second value `/app/` is where to copy it too.

`COPY <src> <dest>`

To run `npm install` you would first need to `cd` into the directory the files are in (`/app`). In a Dockerfile this is done by using the `WORKDIR` command. This sets the working directory, such as `WORKDIR /app` sets `/app` as the directory.

For node, you would also need to run an `npm install` command to install the dependencies being used. In a Dockerfile this is done by using the `RUN` command.

If it is the last command, one which starts a process, a different docker command is used `CMD`

Dockerfile

```
FROM node:19-alpine

COPY package.json /app/
COPY src /app/

WORKDIR /app

RUN npm install

CMD ["node", "server.js"]
```

Now we can build the image from this Dockerfile.

`docker build -t node-app:1.0 .`

`-t node-app:1.0` is the tag name for the image.

`.` is refering to the location of the image.

When run, the it will go line by line, layer by layer.

You will now see the image when you run `docker images`.

`docker run -d -p 3000:3000 node-app:1.0`

You will now see the docker container when you run `docker ps`

You can go to `localhost:3000` in a browser to see the app working.

and you can also run `docker logs 78938`. using the ID (`78938`)

How it fits in?

docker hub > developer > git > jenkins > private repo > (docker hub > deployment server)

This video is part of the [DevOps Tools Playlists; By TechWorld with Nana](https://www.youtube.com/playlist?list=PLy7NrYWoggjxKDRWLqkd4Kbt84XEerHhB)
