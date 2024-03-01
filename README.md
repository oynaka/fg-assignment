

# Assignment Instructions

## Installations
First, clone this repository to your machine
```
git clone https://github.com/oynaka/fg-assignment.git
```

Next, install Composer from [here](https://getcomposer.org/download/) based on your OS

If Composer is installed successfully, open terminal and navigate inside project root directory and run this command
```
composer install
```

And just to be sure, run this command to make sure they're all updated.
```
composesr update
```

Next, install [Docker Desktop](https://www.docker.com/products/docker-desktop/) based on your OS and system.

After Docker is successfully installed and running, run this command in your terminal to build application Docker image.
```
docker compose build
```

And to run your application, simply run this command.
```
docker compose up -d
```

Now if the application runs properly, you should be able to open the test application to the following URLs:

### Assignment 1

http://localhost:8080
___
### Assignment 2

http://localhost:8080/card-display

