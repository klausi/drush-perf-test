<?php

$conn = new mysqli('db', 'db', 'db', 'db');

$results = $conn->query("SELECT n.title FROM node_field_data n
  JOIN node__field_workflow_state f ON n.nid = f.entity_id
  WHERE f.field_workflow_state_value = 'published'
  ORDER BY n.changed DESC
  LIMIT 0,10")->fetch_all();

foreach ($results as $result) {
  print $result[0] . "\n";
}
