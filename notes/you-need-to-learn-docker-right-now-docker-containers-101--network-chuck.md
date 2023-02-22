
# [you need to learn Docker RIGHT NOW!! // Docker Containers 101](https://www.youtube.com/watch?v=eGz9DS-aIeY)

- VMWARE
    - ESX1

The problem virtual machine tried to solve is the need for multiple physical machines.
Instead of 1 machine for 1 operating system; 1 machine for MANY operating systems.

Docker instead, works differently and alows for operating systems to site on top of a main operating system.

Lightweight and fast.

linode.com

Create, Linode, One Click, Docker, Settings; including root password, launch Console

`docker pull centos`

`docker run -d -t --name cantcontainmyself centos`

`docker ps` to see running docker containers

`docker exec -it cantcontainmyself bash`

`ls`

`exit`

`docker pull alpine`

`docker run -t -d --name ohyeah alpine`

`docker ps`

`docker exec -it ohyeah sh`

`ls`

`exit`

`docker pull thenetworkchuck/nccoffee:frenchpress`

`docker run -t -d -p 80:80 --name nccoffe thenetworkchuck/nccoffee:frenchpress`

`docker ps`

Copy IP, and paste into your browser...

`docker stop ohyeah`

`docker start ohyeah`

`docker stats`

ctrl + c

only need 1 kernal

Can only install windows based containers on a windows system
You can only install linux based containers on a linux system

Micro services

example: wordpress container, mysql container

Docker certiification
