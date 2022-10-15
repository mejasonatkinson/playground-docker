# [Docker Crash Course Tutorial; The Net Ninja](https://www.youtube.com/playlist?list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7)

## [Docker Crash Course #1 - What is Docker?](https://www.youtube.com/watch?v=31ieHmcTUOk&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=1)

Docker is used to save setup time for a project.

Virtual machines have there own Operating System and is typically slower, docker containers use the hosts Operating System (kernal) so are often quicker.

**warning:** the hosts Operating System kernal is different on for Windows compared to Apple or other linux based Operating Systems.

[Code for the lessons can be found here](https://github.com/iamshaunjp/docker-crash-course)

## [Docker Crash Course #2 - Installing Docker](https://www.youtube.com/watch?v=8Ev1aXl7TGY&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=2)

As stated previously Docker is harder to run on windows

**Step 1**

Download & Install [Docker](https://docs.docker.com/engine/install/)

**Step 2**

Install WSL

**warning:** Make sure your machine meets the requirements for WSL by searching `winver`

It is best to install WSL Manually as the alternative way, has been known to cause problems.

**Manual installation Steps**

...

When thats running, you can open the Docker Desktop, which you downloaded in Step 1 if you are using a Windows or Mac Device.

To check is docker is installed on Linux, run the command `docker ps` or `docker info` on a terminal screen to verify it is installed and running. 

## [Docker Crash Course #3 - Images & Containers](https://www.youtube.com/watch?v=hhfrFvuHRPU&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=3)

**Dockers Images**

Docker images are blueprints for containers and contain:

- Runtime evnironments
- Application code
- Any dependencies
- Extra cofiguration (env variables)
- Commands

A docker image is read only; meaning if you need to change something in the image you would need to destory the old image and create a new image for it to show.

**Docker Containers**

Containers run an instance of an image, and runs the application

## [Docker Crash Course #4 - Parent Images & Docker Hub](https://www.youtube.com/watch?v=ZVQmnziXEpA&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=4)

Images are made of layers, and the order of the images matter.

**Parent image**

The parent image includes the OS & the runtime environment

There are premade parent images which can be downloaded from the [docker hub](https://hub.docker.com/)

For example, if you search [node](https://hub.docker.com/search?q=node) you will find a Image for [node](https://hub.docker.com/_/node), along with the command to pull the image down to be used (similar to how git works with github).

The command to pull down the image in this case is `docker pull node` 

You do not have to be in any specail directly to run this command.

This image will then appear under images in the docker desktop app.

Click Run, to run the image and generate the container; the container will appear under containers in the docker desktop app.

For the container there is a number of commands that can be used including
CLI (to interact with the commandline of the container), Stop, Restart & Delete.


## [Docker Crash Course #5 - The Dockerfile](https://www.youtube.com/watch?v=G07FcRhYB2c&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=5)

To run a Node project normally you would first run `npm install`
then `node app.js` and that will use the node version installed on the device.

BUT what if we want to use a different node version? To do this we can create a dockerfile.

Dockerfile (no extension, with a capital D) is a file to store instructions to tell the docker what to do.

*If using VS Code it might be worth installing Docker Extension by Microsoft.*

Inside the Dockerfile, Write:

`FROM node:17-alpine`

This means get node version 17 and use the alpine distribution of linux from docker hub

`COPY . /app`

This means COPY the relativePath to the copyToLocation

`RUN npm install`

This runs a command

Adding a Working directory after the FROM, allows us to simplify the COPY command

`WORKDIR /app`

`COPY . .` instead of `COPY . /app`

To run commands after the build process is complete; for example to start the application, we use the `CMD` command

`CMD ["node", "app.js"]`

Setting up the port the App is run on. can be done user the `EXPOSE` command

`EXPOSE 4000`

This is only needed for docker desktop; for port mapping.

In the terminal, in the same directory as the Dockerfile run:

`docker build -t myapp .`

`myapp` is a name you can give to the app. 

The `.` is refering to a relative path to the Dockerfile.

If you open up docker desktop, you will see the Image under images.

## [Docker Crash Course #6 - dockerignore](https://www.youtube.com/watch?v=UHWCkDbN0yM&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=6)

You can avoid copying non-necessary files or folders to the docker image by creating a file called `.dockerignore` inside this file write the file names you want to ignore:

`node_modules` to ignore the `node_modules` folder.

`*.md` to ignore all files ending in `.md` file format.

## [Docker Crash Course #7 - Starting & Stopping Containers](https://www.youtube.com/watch?v=ZPEpreOpqao&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=7)

In Docker Desktop, when you RUN an Image, it will ask you for more infomation including ports, this will expose the application. after setting this up, the container will be created.

...

## [Docker Crash Course #8 - Layer Caching](https://www.youtube.com/watch?v=_nMpndIyaBU&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=8)

Each line, is a new layer to the docker image in the Dockerfile.

The more layers the longer it will take to create, so if somethnig has already been used docker will **cache** that version, so the next build wont take as long.

Changing the order of commands can improve the speed of the docker image being created.

## [Docker Crash Course #9 - Managing Images & Containers](https://www.youtube.com/watch?v=4XsjXscp70o&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=9)

Use `docker images` to show all the images

Use `docker ps` to show all the running containers

Use `docker ps -a` to show all the containers

**How to delete a image**

`docker image rm myapp`

`myapp` in this example is the image name

Images which are being used by containers can not be deleted

To force an image to be deleted even if it is being used by a container you can use the `-f` flag; 

For example: `docker image rm myapp -f`

OR you can delete the container `docker container rm myapp_container` 

You can delete multiple containers at once by listing the containers `docker container rm myapp_container myapp_container2` 

To delete all images, containers and volumns you can run the command `docker system prune -a` and then confirm.

## [Docker Crash Course #10 - Volumes](https://www.youtube.com/watch?v=Wh4BcFFr6Fc&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=10)

Images when created are READ ONLY.

`docker run` will generate a new container,

`docker start` will start a existing container.

IF you have more than 1 container you can reference the container name `docker start myapp_container`

PROBLEM: what if you need a new image each time you make a change to the code...

This means you would need to destory and recreate the image each time.

...

## [Docker Crash Course #11 - Docker Compose](https://www.youtube.com/watch?v=TSySwrQcevM&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=12)

...

## [Docker Crash Course #12 - Dockerizing a React App](https://www.youtube.com/watch?v=QePBbG5MoKk&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=12)

...

## [Docker Crash Course #13 - Sharing Images on Docker Hub](https://www.youtube.com/watch?v=YS35VHsbS-0&list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7&index=13)

...
