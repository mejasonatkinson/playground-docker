<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Compose</title>
</head>
<body>
<h1><?php echo "Hello world! from a PHP container using docker-compose"; ?></h1>
    <code>
        docker-compose up
    </code>
    <p>
        or by clicking the play button in docker desktop
    </p>
    <p>
        The container, can be scene <a href="localhost:8000">localhost:8000</a>.
    </p>
    <p>
        <small>
            This project was made from a tutorial by <a href="https://www.section.io/">Section</a> called: <a href="https://www.section.io/engineering-education/dockerized-php-apache-and-mysql-container-development-environment/">PHP Websites using Docker Containers with PHP Apache and MySQL</a> with some modifications.
        </small>
    </p>
    <h2>Why use docker-compose?</h2>
    <p>Simplest of answers: with docker you would need to create/destory a container each time you make a change, with docker-compose it doesn't...</p>
</body>
</html>