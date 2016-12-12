install:
	npm install
	composer install

start:
	cd docker && docker-compose up -d

stop:
	cd docker && docker-compose stop
