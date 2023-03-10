# [Docker Tutorial for Beginners](https://www.youtube.com/watch?v=pTFZFxd4hOI)


What you nee to know

- 3 months of programming experience
- Basic familiarity with Git

How to take the course

- Be active
    - Take notes
    - Practise

- THIS SECTION

- What is Docker?

Docker is a platform for building, running and shipping applications in a consitent manner 
It works on my machine?
Reasons for this:
+ one or more files missing
+ software version mismatch
+ different configuration
Docker can package these tools

Make onboarding faster

Make it easier to delete

- Virtual Machines vs Containers

+ container
An isolated environment for running an application
    Allow running multiple apps in isolation
    Are lightweight
    Use OS of the host
    Start quickly
    Need less hardware resources

+ virtual machine
An abstraction of a machine (physical hardware)
Hypervisors
    VirtualBox
    VMware
    Hyper-v (windows only)
problems: 
    Each VM needs a full-blown OS
    Slow to start

- Architecture of Docker

[containers]
[os/kernal]

A kernal manages applications and hardware resources.

windows: windows + linux containers
linux: linux containers
apple: linux vm

- Installing Docker

`docker version`

version used in the course: 20.10.5

Make sure that your computer meets the docker requirements

Doesn't explain this process well...

- Development Workflow

Application > Dockerfile >

git > github
docker > dockerhub (for sharing images)

- Docker in Action

`mkdir hello-docker`
`cd hello-docker`
`code .`

app.js

`console.log("Hello Docker!")`;

without docker, you would need to install node and run: `node app.js`

Instructions

start with an OS
Install Node
Copy app files
Run node app.js

Dockerfile

FROM, images are on docker hub

```
FROM node:alpine
COPY . /app
WORKDIR /app
CMD node app.js
```

`docker build -t hello-docker .`

To see the images run:
`docker image ls`

`docker run hello-docker`

https://www.docker.com/play-with-docker/

`docker version`
`docker pull user/image`
`docker image ls`
`docker run user/image`

THIS video is a cut down version of his paid course.....

- THIS SECTION

Linux command line

Linux Distributions

Ubuntu
Debian
Alpine
Fedora
centOS

- Ubuntu

Running Linux

hub.docker.com, ubuntu

`docker pull ubuntu`

or

`docker run ubuntu`

`docker ps`

`docker ps -a`

`docker run -it ubuntu`

This will open the shell:

`root@897389uru2hfuh:/#`

`user@machine:/#`

`/` is directory
`#` is main user
`$` is non-main user

`echo hello` print

hello

`whoami` user

root

`echo $0` location of shell program

`/bin/bash`

`/` in linux
`\` in windows

up/down arrows to see commands

`history` to show commands run.

`!2` to run the second command in the history command

Managing Packages

Package Managers
- npm 
- yarn
- pip
- NuGet

`apt` stands for advanced package tool, some times you also see `apt-get`

`nano`

`apt install nano`

`apt list`

`apt update`

`apt list`

`apt install nano`

`nano`

`ctrl` + `X` to exit

`n` no to save changes

`ctrl` + `l` to clear terminal

`apt remove nano`

`y`

TASK: install python

Linux File System

Windows

C:\
    Program Files
    Windows Files

Linux

/
    bin
    boot
    dev (devices)
    etc
    home
    root
    lib
    var
    proc

`pwd` (print working directory)

`ls` (list)

`ls -1`

`ls -l`

`cd etc/apt#` (tab, for also complete) can use absolute or relative paths

`cd ..`

`ls /bin`

`cd ~`

Manipulating Files and Directories

`cd ~`
`mkdir test`
`ls`
`mv test docker`
`cd docker/`
`touch hello.txt`
`touch file1.txt file2.txt file3.txt`
`ls`
`ls -1`
`mv hello.txt /etc` or `mv hello.txt hello-docker.txt`

`ctrl`+`w` to clear word

`rm file*`

`ls`

`cd ..`

`ls`

`rm -r docker/` to remove directory

`ls`

Editing and Viewing Files

`nano`

`apt install nano`

`nano file1.txt`

`ctrl` + `x` to exit

`y` to save, also given option to change file name

`cat file1.txt`

`more file1.text` `spacebar`

`q` to exit

`apt install less`

`less file1.txt` `up/down arrows`

`head -n 5 file5.txt` first 5 lines

`tail -n 5 file5.txt` last 5 lines

Redirection

`cat file1.txt > file2.txt`

`cat file2.txt`

`cat file1.txt file2.txt`

`cat file1.txt file2.txt > combined.txt`

`echo hello > hello.txt`

`cat hello.txt`

`ls -l /etc > files.txt`

`cat files.txt`