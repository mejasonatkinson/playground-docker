# [Docker networking is CRAZY!! (you NEED to learn it); NetworkChuck](https://www.youtube.com/watch?v=bKFMS5C4CG0)

....

- Knowledge
    - Docker Knowledge
- Host
    - Linux VIM
        - Ubuntu Desktop
            - Virtual Box

1. The Default Bridge

`ip address show`

In Virtual Box, Settings, Network, Attached to: Bridged Adapter

`ip address show`

`sudo apt update`

enter password

`sudo apt install docker.io -y`

`clear`

`ip address show`

docker0?

`sudo docker network ls`

DRIVER = network type

`sudo docker run -itd --rm --name thor busybox`

`sudo docker run -itd --rm --name mjolnir busybox`

`sudo docker run -itd --rm --name stormbreaker nginx`

`sudo docker ps`

`ip address show`

`bridge link`

dhcp?

`sudo docker inspect bridge`

dns

containers can talk to each other

`sudo docker exec -it thor sh`

`ip add`

`ping 172.17.0.3`

`exit`

`sudo docker stop storm breaker`

`sudo docker run -itd --rm -p 80:80 --name stormbreaker nginx`

`sudo docker ps`

localhost:80

2. the user-definded bridge

`sudo docker network create asgard`

`ip address show`

`sudo docker network ls`

`sudo docker run -itd --rm --network asgard --name loki busybox`

`sudo docker run -itd --rm --network asgard --name odin busybox`

`ip address show`

`bridge link`

`sudo docker inspect asgard`

isolated from default bridge

`ping odin`

3. the HOST

`sudo docker stop stormbreaker`

`sudo docker run -itd --rm --network host --name stormbreaker nginx`

he shares everything with the host.. no need to expose anything. no isolation

go to ip of host, and it will work

Christian
YouTube. The Digital Life

4. MACVLAN

`sudo docker network create -d macvlan \`

`--subnet 10.7.1.0/24 \`
`--gateway 10.7.1.3 \`
`-o parent=enp0s3`
`newasgard`

`sudo docker network ls`

`sudo docker stop thor mjolnir`

`sudo docker run -itd --rm --network newasgard \`
`--ip 10.7.1.92 \`
`--name thor busybox`

`sudo docker exec -it thor sh`

wont ping; promiscuous mode, needs enabled

`sudo ip link set enp0s3 promic on`

`sudo docker exec -it thor sh`

In Virtual Box, Settings, Network, Advanced, Promisuous mode, Allow All

`sudo docker exec -it thor sh`

`ping 10.7.1.3`

`exit`

`sudo docker exec -it mjolnir`

`sudo docker exec -it mjolnir sh`

`ping thor`

`sudo docker run -itd --rm --network newasgard --ip 10.7.1.96 --name janefoster nginx`

search: 0.7.1.96

if you don't understand this, you don't care about networking?

5. IPVLAN(L2)

kept making mistakings? no idea what he is doing?

`sudo docker network create -d ipvlan \`
`--subnet 10.7.1.0/24 \`
`--gateway 10.7.1.3 \`
`-o parent=enp0s3 \`
`newasgard`

`sudo docker run -itd --rm --network newasgard \`
`--ip 10.7.1.92 \`
`--name thor busybox`

`sudo docker exec -it thor sh`
`ping 10.7.1.3`

`exit`

`ip address show`

``

6. IPVLAN(L3)

`sudo docker network create -d ipvlan \`
`--subnet 10.7.1.0/24 \`
`-o parent=enp0s3 -o ipvlan_mode=l3\`
`--subnet 10.7.1.0/24 \`
`newasgard`

`sudo docker run -itd --rm --network newasgard \`
`--ip 10.7.1.92 \`
`--name thor busybox`

`sudo docker run -itd --rm --network newasgard \`
`--ip 10.7.1.92 \`
`--name mjolnir busybox`

`sudo docker run -itd --rm --network newasgard \`
`--ip 10.7.1.92 \`
`--name loki busybox`

`sudo docker run -itd --rm --network newasgard \`
`--ip 10.7.1.92 \`
`--name odin busybox`

7. Overlay

docker swarm

8. None

`sudo docker run -itd --rm --network none --name gorr busybox`
`sudo docker exec -it gorr sh`
`ip address show`