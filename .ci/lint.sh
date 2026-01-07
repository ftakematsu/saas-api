#!/bin/sh
set -e

echo "🔍 Rodando Pint..."
./vendor/bin/pint --test

echo "🔍 Rodando PHPStan..."
./vendor/bin/phpstan analyse