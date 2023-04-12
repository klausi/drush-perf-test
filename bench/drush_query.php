<?php

$titles = \Drupal::database()->query("SELECT n.title FROM {node_field_data} n
  JOIN {node__field_workflow_state} f ON n.nid = f.entity_id
  WHERE f.field_workflow_state_value = 'published'
  ORDER BY n.changed DESC
  LIMIT 0,10
  ")->fetchCol();

foreach ($titles as $title) {
  print "$title\n";
}
