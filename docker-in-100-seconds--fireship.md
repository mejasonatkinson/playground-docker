
# [Docker in 100 Seconds; Fireship](https://www.youtube.com/watch?v=Gjnup-PuquQ)

Docker is for packaging software into containers to run reliably in any enviroment. 

This answers the question how do you replicate the enviroment you are using so all the delevopers are looking at the same thing and the same problems.

Options: 

- virtual machine
- host machine
- docker containers (shared kernal)

Docker contains:

- dockerfile
- image
- container

Inside dockerfile

Use FROM

FROM ubuntu:20.04

Use RUN for terminal commands

RUN apt-get install sl

Use ENV for enviroment variables

ENV PORT=8080

Use CMD for default command

CMD ["echo", "Docker is easy"]

Then run: 

docker build -t myapp ./

-t = name tag
./ = path to dockerfile

And:

docker run myapp