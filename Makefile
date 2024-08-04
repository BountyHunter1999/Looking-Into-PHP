up:
	docker compose up -d

run: # filename must be index
	docker run -p 4002:4002 --rm -it -v ./demo:/var/www/app -w /var/www/app  php:fpm-alpine php -S 0.0.0.0:4002

sql:
	-docker rm -f phpdb
	docker run --rm --name phpdb -e MYSQL_USER=pokemon -e MYSQL_PASSWORD=pikachu -e MYSQL_DATABASE=noicedb -e MYSQL_ROOT_PASSWORD=pikachu -v $$(pwd)/docker-entrypoint-initdb.d/:/docker-entrypoint-initdb.d/ \
	-p 3306:3306 mysql:8.0.37-debian

see: # see changes to the file
	watch curl localhost:4002