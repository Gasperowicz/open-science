current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

# 🐘 Composer
composer-env-file:
	@if [ ! -f .env.local ]; then echo '' > .env.local; fi

# 🐳 Docker Compose
.PHONY: start
start: CMD=up --build -d

.PHONY: stop
stop: CMD=stop

.PHONY: destroy
destroy: CMD=down
