# [you need to learn Kubernetes RIGHT NOW!!](https://www.youtube.com/watch?v=7bA0gTroJjw)

Solves a problem with containers/docker

problem:

Hardware > OS > Docker > Container (to many customers = crashes)

solution:

Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)
Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)
Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)

solution:

Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)
Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)
Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)
Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)
Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)
Hardware > OS > Docker > Container > Load Balancer (to many customers = crashes)

The managing of load balancing gets more and more complicated to do.
Updating of the docker container, gets more and more complicated to do.

solutions: kubernetes

Master (kubernete API Server, Scheduler, Controller Manager, etc)

worker node: Hardware > OS > Docker > Container > Kube-Proxy > Kubelet
worker node: Hardware > OS > Docker > Container > Kube-Proxy > Kubelet
worker node: Hardware > OS > Docker > Container > Kube-Proxy > Kubelet

linode... makes it simple...

sign in

left burger menu > kubernetes > create cluster

Kubernetes API Endpoint, IS the Master: and thats how we communicate with it via Kubectl

`curl -L0 https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl`

`ls`

it be listed as kubectl

`chmod +X ./kubectl`
`sudo mv ./kubectl /usr/local/bin/kubectl`

Kubeconfig, IS how to contect kubernetes to use locally.... 9.02

Copy Code.

`nano kubeconfig.yaml`

paste code

ctrl + x : to exit

ctrl + y : to save

`export KUBECONFIG=kubeconfig.yaml`

check worker nodes.

`kubectl get nodes`

`kubectl cluster-info`

the master creates a pod; inside the pod sits the container.

normally its 1 container, 1 pod.

`kubectl run networkchuckcoffee --image=thenetworkchuck/nccoffee:pourover --port=80`

`kubectl get pods`

creatining

`kubectl get pods`

created... it just takes time....

`kubectl describe pods`

shows everything the pod is doing.

Deploy 3, nccoffee, port80.

This is done by using a yaml file or manifests

`nano nccofferdeployment.yaml`

paste code

ctrl + x : to exit

ctrl + y : to save

`kubectl get pods`

`kubectl delete pods networkchuckcoffee`

`kubectl get pods`

`kubectl apply -f nccofferdeployment.yaml`

`kubectl get pods`

creatining

`kubectl get pods`

created... it just takes time....

update yaml file or manifests

`kubestl get deployments`

`kubctl edit deployment networkchuckcoffee-deployment`

replicas: 3 change to... 10

VI not nano

esc

:WQ

enter

`kubectl get pods`

creatining

`kubectl get pods`

created... it just takes time....

`kubectl get pods -o wide`

service = Load balancer = yaml file or manifests

`nano coffee-service.yaml`

paste code

ctrl + x : to exit

ctrl + y : to save

`kubectl apply -f coffee-service.yaml`

`kubectl get services`

in linod look for nodebalancer

`kubectl describe services coffe-service`

update website....

`kubectl edit deployment networkchuckcoffee-deployment`

change image

esc

:WQ

enter

`kubectl get pods`

creatining new, deleting old...

`kubectl get pods`

created... it just takes time....

https://www.amazon.co.uk/dp/1617293725?tag=networkchuck-21&keywords=kubernetes%20in%20action&geniuslink=true

https://app.pluralsight.com/id/signin/?redirectTo=https%3A%2F%2Fapp.pluralsight.com%2Flibrary%2Fcourses%2Fgetting-started-kubernetes%3Fclickid%3DwX7yO4RaVxyNTuX3iFwoS2IeUkAyDBTqB2PySI0%26irgwc%3D1%26mpid%3D1787485%26aid%3D7010a000001xAKZAA2%26utm_medium%3Ddigital_affiliate%26utm_campaign%3D1787485%26utm_source%3Dimpactradius

Kubernetes Cluster > 3 dots ... > delete,
NodeBalancers > 3 dots ... > delete,