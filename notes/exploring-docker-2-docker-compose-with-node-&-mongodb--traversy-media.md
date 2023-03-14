#  [Exploring Docker [2] - Docker Compose With Node & MongoDB; Traversy Media](https://www.youtube.com/watch?v=hP77Rua1E0c)

How to Dockerize... an application

Look at the code... `package.json`? `index.js`? etc...

Create a Dockerfile.

`FROM node:latest`, using latest, might break things...

`RUN npm install`, installs all dependencies.

`CMD ["npm", "start"]`, because `npm start` is the start command set in `package.json`.

```
FROM node:10

WORKDIR /usr/src/app

COPY package*.json ./

RUN npm install

COPY . .

EXPOSE 3000

CMD ["npm", "start"]
```

docker-compose.yml

```
version: '3'
services:
    app:
        container_name: docker-node-mongo
        restart: always
        build: .
        ports:
            - '80:3000'
        links:
            - mongo
    mongo:
        container_name: mongo
        image: mongo
        ports:
            - '27017:27017'
```

`app:` doesn't matter what its called.
`build: .` will look in the current directory for the Dockerfile.
`80:3000` the `80` refers to the localhost port we will use to view it on, `3000` is the port the application is running on inside the container.
`image:` is used because we are not using a Dockerfile, instead we are pulling an image from docker hub.
`27017:27017` the `27017` refers to the port we will use to view the database on localhost and inside of the container. 
`links:` is used to link 1 service/container to another service/container; in this case, mongo.

.dockerignore

```
node_modules
npm-debug.log
```

This file works similar to .gitignore

You should now be ready to start the docker containers...

With the directory run: `docker-compose up` in the terminal or `docker-compose up -d`

Now if you go to `localhost` in a browser you will see the application running.

To stop the containers from running you can do: `ctrl`+`c` or run: `docker-compose down`

Digital Ocean droplet

1. Push everything to GitHub

2. Go to Digital Ocean, Sign Up.

3. Select 'get started with a droplet'

4. Select ubuntu

5. Select One-click apps

6. Select Docker

7. Select Size

8. Use/New SSH Key (create ssh key? (see other course: [SSH Crash Course | With Some DevOps](https://www.youtube.com/watch?v=hQWRp-FdTpc)))

9. Create

10. Copy IP address

11. SSH into the IP address (might be more steps) in the terminal

12. Set up SSH for GitHub (might be more steps)

13. Clone application, using SSH. `git clone project.git`

14. `ls`, `cd` into the project

15. `docker-compose up`

16. Go to the copied IP address in a browser... and you should see the application running.
