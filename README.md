# Exads PHP Developer Test - Question 01 to 04

This project is dedicated to solve the questions #1 to #4 from exads Senior PHP Developer in a single repository, it has a `containerized environment`
with all the tools you'll need to run it, so it is only required that you have `docker` and `docker-compose` tools installed
on your machine.

## Running the Application

in order to properly run this app, you must execute the following steps:

```bash
cp app/.env.example app/.env
make dup
make php #can also use make dci
composer install
```