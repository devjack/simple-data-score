#!/usr/bin/env sh

mkdir -p build/logs

../vendor/bin/phpunit -c config/phpunit.xml

../vendor/bin/phpunit --coverage-clover build/logs/clover.xml

