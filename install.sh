#!/bin/bash
# Install Drupal from config and generate dummy content.

drush site-install -y --db-url=mysql://db:db@db/db --account-name=admin --account-pass=admin --existing-config
drush devel-generate:content --bundles=job
