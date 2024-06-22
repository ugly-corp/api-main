include .env

ARTISAN = php artisan

cache-clear:
	$(ARTISAN) cache:clear
	$(ARTISAN) config:clear
	$(ARTISAN) route:clear

composer-install:
	$(COMPOSER) install --no-cache

db-migrate:
	$(ARTISAN) migrate

db-seed:
	$(ARTISAN) db:seed

db-migrate-fresh:
	$(ARTISAN) migrate:fresh

db-migrate-fresh-seed:
	$(ARTISAN) migrate:fresh --seed

idehelper.generate:
	$(ARTISAN) ide-helper:generate
	$(ARTISAN) ide-helper:models
    $(ARTISAN) ide-helper:meta
