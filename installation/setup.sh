#!/usr/bin/env bash

git checkout -f final
composer install -n
git checkout -f master
composer install -n

php bin/console rad:fixtures:load -r
