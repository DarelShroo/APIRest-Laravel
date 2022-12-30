# DOCKER LNMP Base #

This repository has a boilerplate to build a dockerized environment to develop a Laravel-based web solution.

It is based on Linux (Alpine), Nginx, MySQL 8.0, and PHP 8.0. It has a Memcached and Composer container as well, despite those are not necessary for the correct operation.

Although the .env files should not be committed  to the repo, in this case, due to is a private repository and is for a development environment, is not a problem to commit. 

## What is included in this Docker solution

This Docker solution has the following containers:

- **darel_httpd** This is an Nginx listening at 8080 and ready to show the public content. If you want to expose another folder, you need to change the `etc/httpd/default.conf` and `etc/httpd/default.template.conf` 
- **darel_php** This is the container that runs the PHP using the 8.0 version. If you need to upgrade the PHP version, bear in mind that the Mcrypt needs to be in a compatible version. All PHP configuration is defined at `etc/php/Dockerfile`.
This container has persistence in the parent folder, where should the code resides.
- **darel_db** Is the database container running MySQL 8.0 and without persistence into the local file system. The container has an initialization file in `etc/db/mysql/real/init/create.sql`
If you need to do anything else during the initialization, you must add a new ADD line to `etc/db/mysql/real/init/Dockerfile`
- **darel_composer** is the container that executes composer every single time that the containers are raised. This container will be down when it has been finished.
- **darel_memcached** although is not a common practice to use memcached in development environments, we include it to check that all goes ok when the cache will be activated in a production environment.

The `docker-composer.yml` define a network in order to keep all containers together and visible between them, the network name is `darel_network`

## How do I get set up?

To set up the dockerized solution, you must have installed the Docker Desktop to be able to raise containers and manage them. 

After that you must clone this repository in a directory and then copy all files into a folder what could be called `docker` inside the project folder.

Once the copy is done, then move to the `docker` folder and, from the command line, run the following commands

- `docker-compose build --no-cache` 

This builds the containers without use the cache. We use the parameter `--no-cache` to be sure that all containers are built from scratch and with updated versions.

- `docker-compose up` 

This command will raise all containers and leave open the command line to see the logs of the containers. This should be usefull to see errors, warnings, and other information messages.

There is an alternative for the above commands and it is `docker-compose up --build --force-recreate` with it, we can build (recreating it) the containers and raise them when the build process has finished.

Anyway, you can checkout more information about docker and docker-compose commands on the [Docker documentation website](https://docs.docker.com/).

## Contribution guidelines

Feel free to complete, upgrade or fix this repo. Your contribution will be good for everyone at the company.
