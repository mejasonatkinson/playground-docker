
# [learning Docker is HARD!! (this makes it easy)](https://www.youtube.com/watch?v=iX0HbrfRyvc)

Portainer

- Portainer Server (for local hosts)
- Porttainer Agent (for remote hosts)

https://www.linode.com/

`sudo apt update`

`sudo apt install docker.io -y`

`docker run -itd -p 80:80 nginx`

`docker ps`

`docker volume create portainer_stuff`

`docker run -d -p 9443:9443 -p 8000:8000 --name portainer --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer-ce:latest`

Must be signed up to his website to see more info....

Exposing ports: `9443` and `8000`

`docker ps`

https://ip:9443

Sign up to portainer.io

Select portainer
