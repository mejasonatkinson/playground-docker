# [Intro to Docker [with Java Examples]; JetBrains](https://www.youtube.com/watch?v=FzwIs2jMESM)

Examples, given in Java... but the same basics applies to all.

YOU

[ HelloWorld App ]
[ JVM            ]
[ OS             ]
[ HARDWARE       ]

CO-WORKER

[ HelloWorld App.jar ]
[ JVM                ]
[ OS                 ]
[ HARDWARE           ]

----------

YOU

[ App        ] [ Database ] (Java 11)
[ App Server ]
[ JVM        ]
[ OS         ]
[ HARDWARE   ]

CO-WORKER (no working?)

[ App App.jar      ] [ Database ] (Java8)
[ App Server       ]
[ JVM              ]
[ OS               ]
[ HARDWARE         ]

CO-WORKER; TESTING...

CO-WORKER; DEPLOYMENT...

This is why containers are needed.

Containers are:

- Portable
- Isolated
- Lightweight

The name comes from shipping containers.

YOU

( App        ) ( database )
( App Server )
( JVM        )
[ DOCKER     ]
[ OS         ]
[ HARDWARE   ]

CO-WORKER (it works!)

( App        ) ( database )
( App Server )
( JVM        )
[ DOCKER     ]
[ OS         ]
[ HARDWARE   ]

Virtual Machines VS Containers

VIRTUAL MACHINES

[ App        ]
[ GUEST OS   ] (Large files..)
[ Hypervisor ]
[ HOST OS    ]
[ Hardware   ]

CONTAINERS

[ App      ]
[ Docker   ] (Small files..)
[ Host OS  ]
[ Hardware ]

1. Install Docker
2. Build a Docker image from a dockerfile
3. Run Docker Container

Container is a running instance of the image.

`docker version` to check docker is installed and running

Create a docker file named: `Dockerfile`

```
# Use the OpenJDK 11 image as the base image
FROM openjdk:11

# Create a new app directory for my application files
RUN mkdir /app

# Copy the app files from host machine to image file system
COPY out/production/HelloWorldDocker/ /app

# Set the directory for executing future commands
WORKDIR /app

# Run the Main class
CMD java Main
```

`docker build -t hello-world:1.0 .`

`docker images`

`docker run hello-world:1.0`

`docker ps`

`docker ps -a`

`docker build -t hello-world:2.0 .`

`docker run -d hello-world:2.0`

There is more features in JetBrains...