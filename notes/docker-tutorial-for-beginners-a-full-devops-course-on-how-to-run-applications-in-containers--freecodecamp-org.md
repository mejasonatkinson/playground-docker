# [Docker Tutorial for Beginners - A Full DevOps Course on How to Run Applications in Containers](https://www.youtube.com/watch?v=fqMOX6JJhGo)

https://kodekloud.com/

Practice Labs: https://kodekloud.com/courses/labs-docker-for-the-absolute-beginner-hands-on/?utm_source=youtube_fcc&utm_medium=labs&utm_campaign=docker

Objectives:

- What are Containers?
- What is Docker?
- Why do you need it?
- What can it do?

- Run Docker Containers
- Create a Docker Image
- Networks in Docker
- Docker Compose

- Docker Concepts in Depth

- Docker for Windows/Mac

- Docker Swarm
- Docker vs Kubernetes


## Why do you need docker?

The Matrix from Hell!

What can we do?

DOCKER!

What are containers?

Containers existed before containers, Docker has just made it easier for us to interact with them.

Docker shares the Kernal.. so it can run any OS, that shares the same kernal.

OS, that don't share the same kernal include: linux/windows.

Says that Docker on windows uses a virtual machine to run linux software? (timestamp:8:33)

(ME: it uses windows wsl? Windows subsystem for linux? That allows developers to run a Linux environment without the need for a separate virtual machine; BUT wsl is a type of virtual machine...)

Containers vs Virtual Machines

Containers

- Less Utilization
- Smaller Size

Virtual Machines

- More Utilization
- Larger Size

How is it done?

- Public Docker Registry - dockerhub
    
`docker run ansible`
`docker run mongodb`
`docker redis`
`docker run nodejs`
`docker run nodejs`
`docker run nodejs`
`docker run nodejs`

Containers vs Images

Docker Images is a Packaged Template Plan.

Docker Containers (instances) are made from Docker Images

Docker in DevOps

Developer -> Operations 

A dockerfile is used to make the transference of the developed project transition more smoothly between the developer and the operations teams.

Getting Started

Docker Editions

- Community Edition
    - Free
- Enterprise Edition
    - Paid

Will only be showing how to work with docker on a Linux OS.

How to install Docker on a Linux machine.

`cat /etc/*release*`

View VERSION, to see what version you are using.

Uninstall any OLD versions, IF any already exist on the host...

`sudo apt-get remove docker docker-engine docker.io containerd runc`

Install Via Package Manager...
-OR-
Install Via Convenience Script... (this is the way shown)

`curl -fsSL https://get.docker.com -o get-docker.sh`

To check if it was successful run: `sudo docker version`

https://hub.docker.com

whalesay

`sudo docker run docker/whalesay cowsay Hello-World!`

Docker Commands

Run - start a container

`docker run nginx`

ps - list containers

`docker ps`

`docker ps -a`

Stop - stop a container

`docker ps` to see the docker container, name or id

`docker stop id/name`

Rm - Remove a container

`docker rm id/name`

`docker ps -a`

Images - List images

`docker images`

Rmi - Remove images

`docker rmi image-name`

All containers that are using the image must be deleted first before the image can be deleted.

Pull - download an image

`docker run nginx` first Pulls an image from docker hub (if the image is not already downloaded). Then runs the container.

`docker pull nginx` Pulls an image from docker hub, and does nothing else.

`docker run ubuntu` Runs and exits instance so if you run `docker ps` you wont see it running, this is because a container is not ment to host an operating system. containers are designed to run a task or process. If there is no task or process running in it by default the container will exit.

`docker run ubuntu sleep 5` Runs, the container, with task of sleeping for 5 seconds. after which the container is exited.

Exec - execute a command

`docker exec distracted_mcclintock cat /etc/hosts`

Run - attach and detach

`docker run kodekloud/simple-webapp` runs the container in attach mode... can't do anything else in this terminal/console until the container is stopped.

`docker run -d kodekloud/simple-webapp` runs the container in detach/background mode... the container will continue to run in the background.

`docker attach id` where the id is the id of the container... will allow you to access the attach mode IF when you previously started the container in detach/background mode.

Docker labs

https://kodekloud.com/courses/labs-docker-for-the-absolute-beginner-hands-on/

Has been updated... now requires signup.

Docker for Beginners - Labs

- Docker Lab - 1 - Basic Commands
- Docker Lab - 2 - Run Commands
- Docker Lab - 3 - Images
- Docker Lab - 4 - Docker Compose
- Docker Lab - 5 - Docker Networking

Has 2 types of questions:
- Multiple choice questions.
- Command questions.

Labs only exist for 1 hour before being destoryed.

Docker Run

`docker run redis`

Running older versions of redis?

`docker run redis:4.0` This (`:4.0`) is called a tag. `:latest` is the default tag which gets added IF you never add a tag, and pulls the latest version.

docker hub, tells you what these tags are..

Run - STDIN

Reading input inside a docker container...

Requires you to enter interactive mode...

`docker run -i kodekloud/simple-prompt-docker`

`name`

output: `Hello and Welsone name!`

`docker run -it kodekloud/simple-prompt-docker` to also see the terminal commands

Please enter your name: `name`

output: `Hello and Welsone name!`

Run - PORT mapping

`docker run kodekloud/webapp`

`http://docker-ip:5000` is where the container is running but wont show the container outside of the container.

`http://host-ip:5000` wont show the container.

`docker run -p 80:5000 kodekloud/webapp` mapps the internal port `5000` to the host port `80`.

`http://host-ip:80` will show you what is running on `http://docker-ip:5000`. 

This way you can run many instances of the same code on different ports.

`docker run -p 80:5000 kodekloud/webapp` = `http://host-ip:80` 
`docker run -p 81:5000 kodekloud/webapp` = `http://host-ip:81` 
`docker run -p 82:5000 kodekloud/webapp` = `http://host-ip:82` 
`docker run -p 83:5000 kodekloud/webapp` = `http://host-ip:83` 

RUN - Volume mapping

`docker run mysql` the container is created... the data for mysql is stored is a sub directory: `/var/lib/mysql`

`docker stop mysql`

`docker rm mysql` destorys all that data...

`docker run -v /opt/datadir:/var/lib/mysql mysql` copies the data from inside the container `/var/lib/mysql` to somewhere on the host machine `/opt/datadir`. This will not be destoryed with the container.

Inspect Container

`docker inspect container_name`

Container Logs

`docker logs container_name`

Docker Environment Variables

`python app.py`

`docker run -e APP_COLOR=blue simple-webapp-color`

The course thinks you know python?

`docker inspect container_name` can show you the `Env` Environment Variables.

Docker images

Create your own image....

What am I containerizing

Flask?

How to create my own image?

- OS - Ubuntu
- Update apt repo
- Install dependencies using apt
- Install Python dependencies using pip
- Copy source code to /opt folder
- Run the web server using "flask" command

Dockerfile

```
FROM Ubuntu

RUN apt-get update
RUN apt-get install python

RUN pip install flask
RUN pip install flask-mysql

COPY . /opt/source-code

ENTRYPOINT FLASK_APP=/opt/source-code/app.py flask run
```

`docker build Dockerfile -t username/image-name` to build the image from the Dockerfile.

`docker push username/image-name` to push it to docker hub.

Dockerfile, is a text file that docker can understand. 
It is writen in an INSTRUCTION, ARGUMENT format.
INSTRUCTIONS are always UPPERCASE.

Every image, needs to be based on another image.

Dockerfile, is built using a layered architecture.
When run, it caches, and shows you all the steps by layer.

What can you containerize?

Anything can be containerize?

Docker CMD vs ENTRYPOINT

`docker run ubuntu`
`docker ps` ? container is not running
`docker ps -a` ? container has exited

`docker run ubuntu [COMMAND]`
`docker run ubuntu sleep 5`

Dockerfile

`CMD command param` = `CMD sleep 5`
`CMD ["command", "param"]` = `CMD ["sleep", "5"]`

`ENTRYPOINT ["sleep"]` then you can run `docker run ubuntu-sleeper 10` or `docker run ubuntu-sleeper 20` etc...
BUT if no value us run, you will get an error... To solve this problem you would use both `ENTRYPOINT` and `CMD`.

```
FROM Ubuntu
# entry command
ENTRYPOINT ["sleep"]
# default entry command value
CMD ["5"]
```
with the dockerfile setup, as above. `docker run ubuntu-sleeper` will sleep for 5 seconds. Where as running  `docker run ubuntu-sleeper 10` will overwrite the default value and sleep for 10 seconds.

docker networking

Default networks

- Bridge
`docker run ubuntu`

Private, Internal Network. Which can communicate to other containers within docker.
Port mapping can also be used to see what is visible on a certain container on the host machine.

- null/none
`docker run ubuntu --network=none`

No network/Complete Isolated network

- host
`docker run ubuntu --network=host`

Public, uses the hosts network. which means you can't host multiple instances on the same port.

- User-defined networks
Creating on networks.

`docker network create --driver bridge --subnet 182.18.0.0/16 custom-isolated-network`

`docker network ls` will show you the new network.

`docker inspect container_name` will show you the network settings.

containers can reference containers by name...

Embedded DNS

Docker has a built in DNS Server on 127.0.0.11

Docker storage

File system 

/var/lib/docker
    aufs
    containers
    image
    volumes

Layered architecture

First application (image layers)
- Layer 1. Ubuntu [120MB]
- Layer 2. apt packages [306MB]
- Layer 3. pip packages [6.3MB]
- Layer 4. source code [300B]
- Layer 5. update entrypoint [0B]
Second application (image layers)
- Layer 1. Ubuntu [0MB] uses first application, cached.
- Layer 2. apt packages [0MB] uses first application, cached.
- Layer 3. pip packages [0MB] used first application, cached.
- Layer 4. source code [229B]
- Layer 5. update entrypoint [0B]

Ready Only...

- Layer 6. (container layer) When the container is deleted, any data created in this layer will also be deleted.

Read Write...

Copy-on-write?

Is there away to keep the data, without keeping the container?

Volumes...

`docker volume create data_voluume`

`docker run -v data_volume:/var/lib/mysql mysql`

`docker run -v data_volume2:/var/lib/mysql mysql` docker will auto create a volume

This process is called volume mounting.

`docker run -v /data/mysql:/var/lib/mysql mysql`

`docker run --mount type=bind,source=/data/mysql,target=/var/lib/mysql mysql`

Storage drivers?
- AUFS - (ubuntu)
- ZFS
- BTRFS
- Device Mapper
- Overlay
- Overlay2

Docker compose

This is writen in yaml.. so you should be conforable to write yaml.

```
services:
    webapp:
        image: "username/appname"
    database:
        image: "mongodb"
    messaging:
        image: "redis:alpine"
    orchestration:
        image: "ansible"
```

`docker-compose up`

Sample application - voting

[ voting-app (python)  ] [ result-app (nodejs) ]

[ in-memory DB (redis) ] [ DB (PostgreSQL)     ]

[ Worker (.NET)                                ]

`docker run -d --name=redis redis`
`docker run -d --name=db postgress:9.4 result-app`
`docker run -d --name=vote -p 5000:80 voting-app`
`docker run -d --name=result -p 5001:80` ? I think they did something wrong in there example?
`docker run -d --name=worker worker`

Everything is running BUT Nothing is linked?

`docker run -d --name=vote -p 5000:80 --link redis:redis voting-app`

`g.redis = Redis(host="redis", db=0, socket_timeout=5)` this allows you to reference it inside the code.

`docker run -d --name=db postgress:9.4 --link db:db result-app`

`pg.conntect('postgres://postgres@db/postgress', ...)`

`docker run -d --name=worker --link db:db ---link redis:redis worker` This might be deplicated now.

`connectToRedis("redis")`
`connectToRedis("db")`

How to we convert this into a docker-compse.yml file?

````
redis:
    image: redis
db:
    image: postgres:9.4
vote:
    image: voting-app -OR- build: ./vote
    ports:
        - 5000:80
    links:
        - redis
result:
    image: result-app -OR- build: ./result
    ports:
        - 5001:80
    links:
        - db
worker:
    image: worker -OR- build: ./worker
    links:
        - redis
        - db
````

`build` can be used to link to a Dockerfile, and/or any data needed to build a image

`docker-compose up`

Docker compose - versions..

Docker compose supported different commands, at different times.

The version above was, version 1...

Version 2:

needs to use `version` and `services`.

`links` are no longer needed.

`depends_on` is a new feature added to version 2.

````
version: 2
services:
    redis:
        image: redis
    db:
        image: postgres:9.4
    vote:
        image: voting-app -OR- build: ./vote
        ports:
            - 5000:80
    result:
        image: result-app -OR- build: ./result
        ports:
            - 5001:80
    worker:
        image: worker -OR- build: ./worker
        depends_on:
            - redis
            - db
````

Version 3:

CURRENT VERSION.

````
version: 3
services:
    redis:
        image: redis
    db:
        image: postgres:9.4
    vote:
        image: voting-app -OR- build: ./vote
        ports:
            - 5000:80
    result:
        image: result-app -OR- build: ./result
        ports:
            - 5001:80
    worker:
        image: worker -OR- build: ./worker
        depends_on:
            - redis
            - db
````

Docker compose; networks...

front-end network
back-end network

````
version: 3
services:
    redis:
        image: redis
        networks:
            - back-end
    db:
        image: postgres:9.4
        networks:
            - front-end
    vote:
        image: voting-app -OR- build: ./vote
        ports:
            - 5000:80
        networks:
            - front-end
            - back-end
    result:
        image: result-app -OR- build: ./result
        ports:
            - 5001:80
        networks:
            - front-end
            - back-end
    worker:
        image: worker -OR- build: ./worker
        depends_on:
            - redis
            - db
        networks:
            - front-end
            - back-end
networks:
    front-end:
    back-end:
````

Docker registry...

A repo of all docker images

`docker run nginx`

`nginx` is the image; this is the same as saying `nginx/nginx`

`user/image`

`docker.io/nginx/nginx`

Other registries include:

gcr.io

Private Registries also exist... lost, don't understand?

Docker Engine

When installing docker you are install Docker Engine, on a host.

The Docker Engine includes:

- Docker CLI (command line interface, which talks to the REST API)
- REST API (interfact to talk to Deamon)
- Docker Deamon (background process)

You can use a local Docker CLI, to talk to a hosted Docker REST API. via using `docker -H=remote--docker-engine:2375`. `2375`?
`docker -H=10.123.2.1:2375 run nginx`

containerization.

Namespace
    - Network
    - Process ID
    - Unix Timesharing
    - Mount
    - InterProcess

Namespace - PID

Lost...

cgroups, restrict hardware resources

`docker run --cpus=.5 ubuntu`
`docker run --memory=100m ubuntu`

Docker on Windows.

1. Docker on Windows using Docker Toolbox
2. Docker Desktop for Windows

Docker Toolbox...
    VirtualMachine...
        VirtualBox... etc...
(has requirements)

Docker Desktop
    Microsoft Hyper-V (WSL?)
(has requirements: newier machines)

Linux Containers, on Windows. no Window Containers, on Windows

Window Containers, on Windows; requires more config...

Base Images
- Windows Server Core
- Nano Server

Docker on Mac

1. Docker on Macs using Docker Toolbox
2. Docker Desktop for Macs

Docker Toolbox...
    VirtualMachine...
        VirtualBox... etc...
(has requirements)

Linux Containers, on Macs. no Mac Containers, on Macs or no Windows Containers, on Mac

Docker Desktop
    HyperKit etc...
(has requirements)

Container Orchestration

`docker run nodejs`
`docker run nodejs`
`docker run nodejs` problem? Delete? Create new container?
`docker run nodejs`

Solution to manage containers.

`docker service create --replicas=100 nodejs`

Docker Swarm, Kubernetes, MESOS...

Docker Swarm

combide multiple multiple machines/containers


[ Docker Host: Swarm Manager ] [ Docker Host: Worker/Slave ] [ Docker Host: Worker/Slave ] [ Docker Host: Worker/Slave ]

On the Swarm Manager:

`docker swarm init` will give you the token to use in the next step.

On the Worker/Slave:

`docker swarm join --token <token>`

After running these commands the Worker/Slave becomes a node.

Docker service

`docker run my-web-server`

On the manager container:

`docker service create --replicas=3 my-web-server`

`docker service create --replicas=3 -p 8080:80 my-web-server`

`docker service create --replicas=3 --network frontend my-web-server`

Kubernetes

`kubctl run --replicas=1000 my-web-server`

`kubctl scale --replicas=2000 my-web-server` automatic scalling.

`kubectl rolling-update my-web-server --image=web-server:2`

A/B testing. etc.... and has lots of plugins.

Master

[ Node: Kube ]

Cluster

[ Node: kube ] [ Node: kube ] [ Node: kube ] 

More on kode kloud.