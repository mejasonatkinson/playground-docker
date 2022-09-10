# [Docker Crash Course Tutorial; The Net Ninja](https://www.youtube.com/playlist?list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7)

## [Docker Crash Course #1 - What is Docker?](https://www.youtube.com/watch?v=31ieHmcTUOk&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=1)

- To save setup time for a project.
- Virtual machines - has its own os and is typically slower
- Containers are quicker but use the hosts os kernal

- Course uses NodeJS, Express & React

- Code for the lessons here: https://github.com/iamshaunjp/docker-crash-course

## [Docker Crash Course #2 - Installing Docker](https://www.youtube.com/watch?v=8Ev1aXl7TGY&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=2)

https://docs.docker.com/engine/install/

- Harder to run on Windows

Download Docker

Follow WSL install instructions

Search `winver` to find if you meet the requirements for WSL

Use: 

- Command for powershell `wsl --install`; but is buggy
- Manual installation

Manual installation: 

- open powershell, right click; run as admin
- copy and paste command
- copy and paste command (virtual machine; and restart machine)
- downlaod kernal and run package
- open powershell, right click; run as admin
- copy and paste command
- microsoft store; search ubuntu; get; installs
- set username/password

When thats running, you can open the docker desktop.

<!-- 

Not part of the course but useful to know....

### How do I know if Docker is installed on Linux?

To check if you have Docker installed, run the command `docker ps` or `docker info` on a terminal screen to verify it is installed and running. 

-->

## [Docker Crash Course #3 - Images & Containers](https://www.youtube.com/watch?v=hhfrFvuHRPU&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=3)

### Dockers Images

blueprints for containers:

- Runtime evnironments
- Application code
- Any dependencies
- Extra cofiguration (env variables)
- Commands

Are read only; if you need to change something in the image you would need to destory the old image and create a new image.

### Docker Containers

Containers run an instance of an image, and runs the application

Containers are Isolated processed

## [Docker Crash Course #4 - Parent Images & Docker Hub](https://www.youtube.com/watch?v=ZVQmnziXEpA&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=4)

Images are made of layers, and the order of the images matter.

### Parent image

The parent image includes the OS & the runtime environment

There are premade parent images which can be downloaded from the [docker hub](https://hub.docker.com/)

For example, if you search [node](https://hub.docker.com/search?q=node) you will find a Image for [node](https://hub.docker.com/_/node), along with the command to pull the image down to be used (similar to how git works with github etc.).

The command to pull down the image in this case is `docker pull node` you do not have to be in any specail directly to run this command.

This image will then appear under images in the docker desktop app.

Click Run, to run the image and generate the container; the container will appear under containers in the docker desktop app.

For the container there is a number of commands that can be used including
CLI (to interact with the commandline of the container), Stop, Restart & Delete.

## [Docker Crash Course #5 - The Dockerfile](https://www.youtube.com/watch?v=G07FcRhYB2c&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=5)

The next layers; are changes to the image, you do this by creating a dockerfile.

To run a Node project normally you would first run `npm install`
then `node app.js` and that will use the node version installed on the device.

BUT what if we want to use a different node version we will need to create a docker file.

Dockerfile (no extension, with a capital D)

If using VS Code it might be worth installing Docker Extension by Microsoft.

Inside the Dockerfile, file. Write:

`FROM node:17-alpine`

This means get node version 17 and use the alpine distribution of linux from docker hub

`COPY . /app`

This means COPY the relativePath to the copyToLocation

`RUN npm install`

This runs a command

Adding a Working directory after the FROM, allows us to simplify the COPY command

`WORKDIR /app`

`COPY . .`

To run command after the build process is complete; for example to start the application, we use the CMD, command

`CMD ["node", "app.js"]`

Setting up the port the App is run on. 
Only needed for docker desktop for port mapping.

`EXPOSE 4000`

In the terminal, in the same directory as the Dockerfile, 
run `docker build -t myapp .`
myapp is a name you can give to the app.
. is refering to a relative path to the Dockerfile.

If you open up docker desktop, you can see the Image under images.

## [Docker Crash Course #6 - dockerignore](https://www.youtube.com/watch?v=UHWCkDbN0yM&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=6)

You can avoid copying non-necessary files or folders to the docker image by creating a file called .dockerignore
Inside this file write the file names you want to ignore:

`node_modules`

`*.md`

## [Docker Crash Course #7 - Starting & Stopping Containers](https://www.youtube.com/watch?v=ZPEpreOpqao&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=7)

### Create a new container

In Docker Desktop, when you RUN an Image, it will ask you for more infomation including ports, this will expose the application. after setting this up, the container will be created.

docker images

`docker run --name myapp_container1 myapp` 

(myapp, refers to the name you gave it)

open up a new tab/terminal, to stop a container

`docker stop myapp_container1`

`docker run --name myapp_container2 -p 4000:4000 -d myapp` 

<!--

    Found this difficult to understand....

-->

localhost:4000

### Stop/Start a container

docker ps -a

`docker start myapp_container2`

## [Docker Crash Course #8 - Layer Caching](https://www.youtube.com/watch?v=_nMpndIyaBU&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=8)

Each line, is a new layer to the docker image in the Dockerfile.
Changing the image.

The more layers the longer it will take to create, so if somethnig has already been used docker will cache that version, so the next build wont take as long.

`COPY package.json .`

`RUN npm install`

`COPY . .`

Changing the order will improve the speed of the docker image being created.

## [Docker Crash Course #9 - Managing Images & Containers](https://www.youtube.com/watch?v=4XsjXscp70o&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=9)

`docker images` to show all the images

`docker ps` to show all the running containers

`docker ps -a` to show all the containers

How to delete a image

`docker image rm myapp`

myapp = the image name

Images which are being used by containers can not be deleted

`docker image rm myapp -f`

-f forces an image to be deleted even if it is being used by a container

or you can delete the container

`docker container rm myapp_container2` 

You can delete multiple containers at once by listing the containers.

`docker container rm myapp_container2 myapp_container3` 

To delete all images, containers and volumns you can run the command:

`docker system prune -a`

and then confirm.

`docker build -t myapp:v1 .`

`docker run --name myapp_container -p 4000:4000 myapp:v1`

## [Docker Crash Course #10 - Volumes](https://www.youtube.com/watch?v=Wh4BcFFr6Fc&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=10)

Images when created are read only

`docker ps -a`

`docker start myapp_container`

`docker run` will generate a new container,

`docker start` will start a existing container.

Need a new image each time you make a change to the code..
Which means destorying and recreating the image.

OR you can use Volumes

In the Dockerfile

`FROM ...`

`RUN npm install -g nodemon`

`CMD ["npm", "run", "dev"]`

package.json

`"scripts": {`
    `"dev": "nodemon -L app.js"`
`},`

(for windows you need the extra flag -L)

`docker build -t myapp:nodemon .`

`docker stop myapp:nodemon`

`docker run --name myapp_container -p 4000:4000 --rm -v {absolutePath}:/app -v /app/node_modules myapp:v1`

Docker compose, improves this process.

## [Docker Crash Course #11 - Docker Compose](https://www.youtube.com/watch?v=TSySwrQcevM&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=12)

docker-compose.yaml

`version: "3.8"`
`services: `
`   api: ` indent is important to yaml files.
`       build: {relativePath ./api}`
`       container_name: api_container`
`       ports:`
`           - '4000:4000'`
`       volumnes:`
`           - {relativePath ./api:/app}`
`           - {relativePath ./app/node_modules}`

In terminal `docker system prune`

`docker-compose up`

`docker-compose down`

`docker-compose down --rmi all -v`

## [Docker Crash Course #12 - Dockerizing a React App](https://www.youtube.com/watch?v=QePBbG5MoKk&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=12)

.dockerignore

node_modules

Dockerfile

FROM node:17-alpine

WORKDIR /app

COPY package.json .

RUN npm install

COPY . .

EXPOSE 3000

CMD ["npm", "start"]


docker-compose.yaml

`version: "3.8"`
`services: `
`   api: `
`       build: {relativePath ./api}`
`       container_name: api_container`
`       ports:`
`           - '4000:4000'`
`       volumnes:`
`           - {relativePath ./api:/app}`
`           - {relativePath ./app/node_modules}`
`   myblog: `
`       build: {relativePath ./myblog}`
`       container_name: myblog_container`
`       ports:`
`           - '3000:3000'`
`       volumnes:` // remove on windows
`           - {relativePath ./myblog:/app}` // wont work on windows.
`           - {relativePath ./app/node_modules}`
`       stdin_open: true`
`       tty: true`

docker-compose up

## [Docker Crash Course #13 - Sharing Images on Docker Hub](https://www.youtube.com/watch?v=YS35VHsbS-0&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=13)

hub.docker.com

login/signup

create repository

docker push {username}/{repo-name}

`docker build -t {username}/{repo-name} .`

`docker images`

`docker login`

`docker push {username}/{repo-name}`

refresh docker hub. you will see it on docker hub.

`docker image rm {username}/{repo-name}`

`docker images`

`docker pull {username}/{repo-name}`

Other topics include

Deploying &
Kubernetes