<?php 
//require_once 'database/databasetablebuilder.php';
require_once 'database/insertquery.php';
require_once 'date.php';
require_once 'variables.php';

$database = mysqli_connect("localhost", "familyphotos", "charlie");
$database->select_db("familyphotos");

/*$table_builder = new DatabaseTableBuilder('tags');
$table_builder->add_auto_incr_int('id');
$table_builder->add_string('tag', 32);
$table_builder->add_date_time('time_added');
$table_builder->add_index('id');
$table_builder->create_table();*/

if (is_post("newtag")) {
  $insert_query = new InsertQuery('tags');
  $insert_query->null_value();
  $insert_query->value(post('newtag'));
  $insert_query->value(date_time_for_mysql());
  $insert_query->query();
  echo $database->insert_id;
  return;
}

http_response_code(400);
?>