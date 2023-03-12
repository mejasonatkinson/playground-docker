# [12 Docker Interview Questions That You Can Practice to Ace Your Technical Interview; freeCodeCamp.org](https://www.codecademy.com/resources/blog/docker-interview-questions-that-you-can-practice-to-ace-your-technical-interview/)

*Answered on: 10/03/23*

1. What is a Docker container?

Answer: A docker container, is a directory which contains the code and all the dependencies needed to make the code work. 

**FAILED**

---
- The applications you create plus their dependencies. 
- They can run as systems that are isolated but are in the host system. 
- They share system resources and kernel resources with other containers.
- Eliminates infrastructure dependency when deploying and running applications. 
- This enables these applications to run on any platform regardless of the supporting infrastructure.
---

2. What are Docker images?

Answer: A docker image, is a snapshot of the container with the docker file that can be uploaded to a registry.

**FAILED**

---
- Executable packages that are bundled with the code and dependencies of an application. 
- Their purpose is to create containers, and you can deploy them to any Docker environment. 
- The containers can then be used to run the application.
---

3. What is a Docker file?

Answer: A docker file, is a file which contains instructions telling docker how to build the image.

**PASS**

---
- A docker file is a text file containing all the commands that need to be run to build a particular image. Docker automatically builds images by reading the instructions from this file.
---

4. What’s the functionality of a hypervisor?

Answer: A hypervisor allows you to install other operating systems using the kernel of the hosts operating system. 

**PASS** *but needs to be expanded on...*

---
- Enables virtualization to occur. This is sometimes called a virtual machine monitor, and it divides the host resources and allocates them to each installed guest environment.
- Hypervisors allow multiple operating systems to be installed on one host system.
- There are two types of hypervisors — native and hosted.
- A native hypervisor, also referred to as a bare-metal hypervisor, runs on the underlying host system. 
- This ensures it has direct access to the host hardware, so a base operating system is not required.
- A hosted hypervisor uses the underlying host operating system, which contains the existing operating system.
---

5. What is Docker Compose?

Answer: Docker Compose, is a yaml file which allows you to run multiple Dockerfiles or images you can pull down from a registry.

**PASS** *but needs to be expanded on...*

---
- Docker Compose is a tool that uses YAML files to configure all the details of the services needed to set up a Docker-based application. 
- It also includes a number of commands that can be used to manage an instance, such as checking the status of a service, outputting logs, or canceling and rebuilding a service.
---

6. What is Docker Namespace?

Answer: No idea?

**FAILED**

---
- A Namespace is a feature of Linux for partitioning operating system resources in a manner that’s mutually exclusive. 
- Within Docker, namespaces form the isolated workspaces that constitute a container.  
- Docker namespaces are portable and don’t affect the underlying host.
---

7. Which Docker command lists the status of all containers?

Answer: `Docker ps -a`

**PASS** 

---
- The command for listing the status of Docker containers is docker ps -a.
---

8. What would cause you to lose data stored in a container?

Answer: Data is stored in volumes, so if you delete the volumes relating to the docker container, data will be lost.

**FAILED**

---
- This question could catch you off guard since it’s sort of a trick question. But remember that data stored in a container remains there unless the container is deleted.
---

9. What is Docker Image Registry?

Answer: A docker image registry is very similar to npm or github, where people can upload docker images and other people can pull them images down to use. 

**PASS** *but needs to be expanded on...*

---
- Docker Image Registry is an area where you store Docker images. Rather than converting the applications to containers each time, developers can directly use these images.
- The registry can be private or public. Docker Hub is a very popular public registry.
---

10. What’s a Docker Hub?

Answer: Docker Hub is a docker image registry.

**PASS** 

---
- A Docker Hub is a service provided by Docker for managing and sharing container images. Much like GitHub, Docker Hub makes it easy to administer and share resources with your team.
---

11. How many Docker components exist?

Answer: No idea?

**FAILED**

---
- There are three Docker components: Docker Client, Docker Host, and Docker Registry.
- Docker Client performs operations like build and run when you need to communicate with the Docker Host. It contains the main Docker daemon and hosts containers with their associated images. The daemon connects to the Docker Registry. Docker Registry stores the images and can be private or public.
---

12. How do you check for the current version of the Docker client and server?

Answer: `docker version`

**PASS** *but needs to be expanded on...*

---
- All information about Docker client and server versions can be obtained using the command “docker version” (minus the quotes). You can obtain only the server version by typing docker version –format ‘{{.Server.Version}}’
---
