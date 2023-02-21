
# [Cloud Run QuickStart - Docker to Serverless; Fireship](https://www.youtube.com/watch?v=3OP-q55hOUI)

GCP (Google Cloud Platform)

Vue > Docker > Cloud Run > Firebase Hosting

https://fireship.io/lessons/firebase-microservices-with-cloud-run/

Docker must be a stateless container

SSR (VUE NUXT)

this works with angular universal, react next, wordpress, ruby on rails as long as you keep the database out of the container.

you will need
docker and google cloud sdk installed

`npx create-nuxt-app ssr-app`

universal for rendering mode

Dockerfile

````
FROM node:10

WORKDIR /usr/src/app

ENV PORT 8080
ENV HOST 0.0.0.0

COPY package*.json ./

RUN npm install --only=production

COPY . .

RUN npm run build

CMD npm start
````

`sudo docker build ./`

get the image id 3cabaa905fed

`sudo docker run -p 8080:8080 3cabaa905fed`

`sudo docker tag sudo docker push gcr.io/project-name/project-name`

this will take some time

CI/CD cloud build from scratch; used to automate this process

make sure the image you just created is on GCP

create service

select container image

Allow unauthenticated invocations

create

this will take some time

Add mapping or firebase

`firebase init hosting`

no for single-page app

rm public/index.html

firebase.json

...

`firebase deploy --only hosting`