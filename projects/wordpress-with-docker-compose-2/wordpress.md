# Docker Compose

## Wordpress container using docker-compose

Run `docker-compose up -d` or by clicking the play button in docker desktop.

The webiste container, can be scene at [localhost:8000](localhost:8000).

The phpmyadmin container, can be scene at [localhost:8080](localhost:8080).

This project was made from a tutorial by [Traversy Media](https://www.youtube.com/@TraversyMedia) called: [Quick Wordpress Setup With Docker](https://www.youtube.com/watch?v=pYhLEV-sRpY). I had to modify the file path from the tutorial to get this to work on windows from `./:var/www/html` to `./:/var/www/html` inside the docker-compose.yml file. I also created a sub directory to better organise the code: `./wordpress/:/var/www/html`.

### Why use docker-compose?

Simplest of answers: with docker you would need to create/destory a container each time you make a change, with docker-compose it doesn't...

### Problems with this project...

- [ ] Follow along from 9:11 (FIXED BUG)

*You might see an errors on the localhost ports, IF you click into the localhost to fast. Refreshing the browser window will fix this eventually; docker say it is complete the in terminal alot sooner that it really is.*