<?php
require_once 'database/databasetablebuilder.php';
require_once 'database/insertquery.php';
require_once 'database/selectquery.php';
require_once 'date.php';

class TagsManager {
  function create_table() {
  	$table_builder = new DatabaseTableBuilder('tags');
  	$table_builder->add_auto_incr_int('id');
  	$table_builder->add_string('tag', 32);
  	$table_builder->add_date_time('time_added');
    $table_builder->add_index('id');
  	$table_builder->create_table();
  }
  function add_tag($tag) {
  	$insert_query = new InsertQuery('tags');
  	$insert_query->null_value();
  	$insert_query->value($tag);
  	$insert_query->value(date_time_for_mysql());
  	$insert_query->query();
  	global $database;
    return $database->insert_id;
  }
  function get_tags() {
  	$select_query = new SelectQuery("*");
  	$select_query->set_table('tags');
  	return $select_query->query();
  }
}

?>