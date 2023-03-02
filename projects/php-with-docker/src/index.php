<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker</title>
</head>
<body>
    <h1><?php echo "Hello world! from a PHP container using docker"; ?></h1>
    <code>
        docker build . -t containername/imagename
    </code>
    <code>
        docker run --name=projectname -p=3000:3000 containername/imagename
    </code>
    <p>
        or by clicking the play button in docker desktop
    </p>
    <p>
        The container, can be scene <a href="localhost:3000">localhost:3000</a>.
    </p>
    <p>
        <small>
            This project was made from a video tutorial by <a href="https://www.youtube.com/@W3CloudHub">W3CloudHub</a> called: <a href="https://www.youtube.com/watch?v=9UQrDnfhDsU">Build a PHP Image from Scratch | Docker Tutorial for Beginners</a> with some modifications.
        </small>
    </p>
</body>
</html>