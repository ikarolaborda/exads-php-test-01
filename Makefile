

.DEFAULT_GOAL := help

help:
	@echo "Please choose what you want to do: \n" \
	" make docker-up: start docker container \n" \
	" make docker-down: stop docker container \n" \
	" make docker-restart: restart docker container \n" \
	" make dci: composer install inside container \n" \
	" make dcu: composer update inside container \n" \
	" make access-mysql: go into the mysql container \n" \
	" make access-php: go into the php container \n"

dup:
	export COMPOSE_FILE=docker-compose.yml; docker-compose --env-file app/.env up -d && sudo chown -R $(USER):$(shell id -g) app/

ddw:
	export COMPOSE_FILE=docker-compose.yml; docker-compose --env-file app/.env down --volumes

drs:
	export COMPOSE_FILE=docker-compose.yml; docker-compose down --volumes && docker-compose --env-file app/.env up -d

dci:
	docker exec -it php composer install && sudo chown -R $(USER):$(shell id -g) app/vendor

dcu:
	docker exec -it php composer update && sudo chown -R $(USER):$(shell id -g) app/vendor

php:
	docker exec -it php bash