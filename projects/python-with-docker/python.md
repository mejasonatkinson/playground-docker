# Docker

## Python container using docker

Check to see if Docker is installed by running `docker -v`

Run `docker build -t python-imdb` to build the image, and name/tag it as 'python-imdb'.

Run `docker run python-imdb` to run the container; the output will appear in the terminal.

IF the script required input from the user in the terminal (see main.py), the run command requires accouple more flags `docker run -i -t python-imdb`. The `-i` flag tells docker that the container needs to be interactive. The `-t` flag tells docker that the container needs a virtual terminal to interact with the container. 

This project was made from a tutorial by [Docker]() and [Patrick Loeber]() called: [How to containerize Python applications with Docker](https://www.youtube.com/watch?v=0UG2x2iWerk). The code for this tutorial can be found here: [https://github.com/patrickloeber/python-docker-tutorial](https://github.com/patrickloeber/python-docker-tutorial)
