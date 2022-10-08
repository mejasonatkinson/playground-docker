
# [Docker in 100 Seconds; Fireship](https://www.youtube.com/watch?v=Gjnup-PuquQ)

Docker is for packaging software into containers to run reliably in any enviroment. 

This answers the question how do you replicate the enviroment you are using, so all the delevopers are looking at the same thing and the same problems.

There accouple of options: 

- virtual machines
- host machines
- docker containers (shared kernal)

Docker contains:

- a dockerfile
- a docker image
- a docker container

Inside a **dockerfile**

Use FROM for OS/Version

`FROM ubuntu:20.04`

Use RUN for terminal commands

`RUN apt-get install sl`

Use ENV for enviroment variables

`ENV PORT=8080`

Use CMD for default command

`CMD ["echo", "Docker is easy"]`

Then in the terminal type:

`docker build -t myapp ./`

-t = name tag
./ = path to dockerfile

This will create/build the docker.

Then in the terminal type:

`docker run myapp`

This will run the docker.
