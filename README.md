# Ynmo Task

#Assumption
I assume that the user exposed these api is authenticated and authorized

## Installation
Run below commands
```bash

composer install
cp .env.example .env

Access the endPoint through "{base_url}/api/search"
You can add filter like this "{base_url}/api/search?hotel_name=x&destination=x&price_range=100:200&sort_by=price"


To run tests:
Run "vendor/bin/phpunit" command, if you want to filter with test-case run "vendor/bin/phpunit --filter='test-case name'"

```
#Run With Docker

Run below commands
```bash

docker-compose up -d

#List all of the running containers:
 docker ps

#Access the apis through
http://your_server_ip/api/

```
