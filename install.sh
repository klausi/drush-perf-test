#!/bin/bash
# Install Drupal from config and generate dummy content.

drush site-install -y --db-url=mysql://db:db@db/db --account-name=admin --account-pass=admin --existing-config
drush devel-generate:content --bundles=job
# Set some random node changed dates. This is not ideal, but good enough for our
# test.
drush sql-query 'UPDATE node_field_data SET changed = UNIX_TIMESTAMP((SELECT CURRENT_TIMESTAMP - INTERVAL FLOOR(RAND() * 500 * 24 * 60 *60) SECOND))'
drush sql-query 'UPDATE node_field_revision SET changed = UNIX_TIMESTAMP((SELECT CURRENT_TIMESTAMP - INTERVAL FLOOR(RAND() * 500 * 24 * 60 *60) SECOND))'
