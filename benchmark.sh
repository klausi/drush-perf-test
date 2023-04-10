#!/bin/bash

# Main benchmark script tying together all our use cases.

./hyperfine --warmup 3 \
  "php empty.php" \
  "drush scr empty.php" \
  "php -d opcache.file_cache=/tmp vendor/bin/drush scr empty.php"
