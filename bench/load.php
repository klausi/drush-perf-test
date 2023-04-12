<?php

use Drupal\node\Entity\Node;

$job_nids = \Drupal::entityQuery('node')
  ->condition('type', 'job')
  ->condition('field_workflow_state', 'published')
  ->accessCheck(FALSE)
  ->range(0, 10)
  ->sort('changed', 'DESC')
  ->execute();

$jobs = Node::loadMultiple($job_nids);

foreach ($jobs as $job) {
  print $job->getTitle() . "\n";
}
