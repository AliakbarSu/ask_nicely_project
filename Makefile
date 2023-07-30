COMPOSE=docker-compose


migrate:
	$(COMPOSE) exec php php ./Migrations/migrate.php
	
