use mysql::*;
use mysql::prelude::*;

fn main() -> std::result::Result<(), Box<dyn std::error::Error>> {
    let url = "mysql://db:db@db:3306/db";
    let pool = Pool::new(url)?;
    let mut conn = pool.get_conn()?;

    let result: Vec<String> = conn
        .query(
            "SELECT n.title FROM node_field_data n
            JOIN node__field_workflow_state f ON n.nid = f.entity_id
            WHERE f.field_workflow_state_value = 'published'
            ORDER BY n.changed DESC
            LIMIT 0,10"
        )?;
    for title in result {
        println!("{}", title);
    }

    Ok(())
}
