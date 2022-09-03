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

### How do I know if Docker is installed Linux?

To check if you have Docker installed, run command `docker ps` or `docker info` on a terminal screen to verify it is installed and running. 

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

## [Docker Crash Course #5 - The Dockerfile]()

## [Docker Crash Course #6 - dockerignore]()

## [Docker Crash Course #7 - Starting & Stopping Containers]()

## [Docker Crash Course #8 - Layer Caching]()

## [Docker Crash Course #9 - Managing Images & Containers]()

## [Docker Crash Course #10 - Volumes]()

## [Docker Crash Course #11 - Docker Compose]()

## [Docker Crash Course #12 - Dockerizing a React App]()

## [Docker Crash Course #13 - Sharing Images on Docker Hub]()

