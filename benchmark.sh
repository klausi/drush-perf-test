#!/bin/bash

# Main benchmark script tying together all our use cases.

cd bench
../hyperfine --warmup 3 -N \
  "drush scr load.php" \
  "php -d opcache.file_cache=/tmp ../vendor/bin/drush scr load.php" \
  "drush scr drush_query.php" \
  "php -d opcache.file_cache=/tmp ../vendor/bin/drush scr drush_query.php" \
  "php php_query.php" \
  "php empty.php" \
  "../droprabbit"
