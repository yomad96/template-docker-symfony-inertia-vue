.DEFAULT_GOAL = help
DOCKER_COMPOSE=@docker compose
DOCKER_EXEC=@docker exec -it
APP_NAME=$(shell grep APP_NAME ./deployments/local/.env | cut -d= -f2)
APP_DIR=app
COMPOSER=docker run --rm -it \
	-v $(PWD)/$(APP_DIR):/app \
	-w /app \
	composer:latest

help:
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^## ——)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help

## —— Docker 🐳  —————————————————————————————————————————————————————
start:	## Lancer les containers docker (en mode dev)
	$(DOCKER_COMPOSE) -f ./deployments/local/compose.yaml up -d
.PHONY: start

stop:	## Arréter les containers docker
	$(DOCKER_COMPOSE) -f ./deployments/local/compose.yaml down
.PHONY: stop

restart: stop start	## redémarrer les containers (en mode dev)
.PHONY: restart

ps: ## Affiche les containers docker
	@docker ps
.PHONY: ps

bash: ## Entrer dans le container app
	$(DOCKER_EXEC) $(APP_NAME)_app bash
.PHONY: bash-front

node: ## Entrer dans le container Node
	$(DOCKER_EXEC) $(APP_NAME)_node sh
.PHONY: node

npm: ## Exécuter une commande npm (ex. make npm ARGS="install vue")
	docker compose -f ./deployments/local/compose.yaml exec node npm $(ARGS)
.PHONY: npm

install-symfony:
	@mkdir -p $(APP_DIR)
	@if [ ! -f $(APP_DIR)/composer.json ]; then \
		echo "Installing Symfony skeleton..."; \
		$(COMPOSER) composer create-project symfony/skeleton:"7.4.*" . --no-interaction; \
		echo "Installing Symfony webapp pack..."; \
		$(COMPOSER) composer require webapp --no-interaction; \
	else \
		echo "Symfony already installed."; \
	fi
