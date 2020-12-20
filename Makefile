up:
	docker-compose up -d

down:
	docker-compose down

test:
	vendor/bin/phpunit --testdox

test-unit:
	vendor/bin/phpunit --filter=unit

test-feature:
	vendor/bin/phpunit --filter=feature

assets-dev:
	docker-compose exec node npm run dev

assets-prod:
	docker-compose exec node npm run prod

assets-watch:
	docker-compose exec node npm run watch

assets-i-fontawesome:
	docker-compose exec node npm install --save-dev @fortawesome/fontawesome-free

perm:
	sudo chgrp -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache
	sudo chmod -R uga+rw storage bootstrap/cache
