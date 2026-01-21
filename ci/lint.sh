#!/bin/bash
set -e

echo "🎨 Rodando lint (Laravel Pint)..."

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_ROOT="$(cd "$SCRIPT_DIR/.." && pwd)"

cd "$PROJECT_ROOT/src"

./vendor/bin/pint --test
