# [Docker in 100 Seconds; Fireship](https://www.youtube.com/watch?v=Gjnup-PuquQ)

A tool which can package software into containers to run reliably in any enviroment.

What is a container?

Imagine that you have built a application of a specific version of a operating system or tooling software. BUT not everyone uses that specific version or tooling. so the question becomes; how do we replicate the enviroment.

The can be done in accouple of different ways.

1. virtual machines with its own OS (slower)
2. docker containers with shared kernel (faster)

Docker is made up of 3 fundamentals

- DOCKERFILE
- IMAGE
- CONTAINER

The DOCKERFILE is like the DNA and tells docker how to build a IMAGE.

The IMAGE is a snapshot of your software, and all of its dependencies down to the operating system level.

The IMAGE is immutable(unchanging/unable to be changed) and can be used to spin up multiple CONTAINERS

Create a Dockerfile

````
FROM ubuntu:20.04

RUN apt-get instal s1

ENV PORT=8080

CMD ["echo", "Docker is easy"]
````

FROM, is the base image which is pulled down fro docker hub.
RUN, is for running commands inside of the image
ENV, is for setting enviroment variables
CMD, is for running commands...

`docker build -t myapp ./`

`-t` is for name tag
`./` is the path to the dockerfile

`docker run myapp`