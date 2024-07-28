run: # filename must be index
	docker run -p 4002:4002 --rm -it -v ./demo:/var/www/app -w /var/www/app  php:fpm-alpine php -S 0.0.0.0:4002

see: # see changes to the file
	watch curl localhost:4002