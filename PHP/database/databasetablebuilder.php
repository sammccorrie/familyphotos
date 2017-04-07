<?php
//=============================================================================
//
// Class for building new tables
//
//-----------------------------------------------------------------------------

require_once '../stringbuilder.php';
require_once 'database.php';

//=============================================================================
class DatabaseTableBuilder {

  function __construct($name) {
    $this->m_output_strings = new StringBuilder();
    $this->m_name = $name;
  }
  
  function add_auto_incr_int($name) {
    $this->add_member("$name INT NOT NULL AUTO_INCREMENT");
  }
  
  function add_bool($name) {
    $this->add_member("$name TINYINT(1)");
  }
  
  function add_int($name) {
    $this->add_member("$name INT");
  }
  
  function add_big_int($name) {
    $this->add_member("$name BIGINT");
  }
  
  function add_positive_int($name) {
    $this->add_member("$name INT NOT NULL");
  }
  
  function add_string($name, $max_length) {
    $this->add_member("$name VARCHAR($max_length)");
  }
  
  function add_date($name) {
    $this->add_member("$name DATE");
  }
  
  function add_date_time($name) {
    $this->add_member("$name DATETIME");
  }
  
  function add_null_date($name) {
    $this->add_member("$name DATETIME NULL DEFAULT NULL");
  }
  
  function add_key($name) {
    $this->add_member("KEY($name)");
  }
  
  function add_index($name) {
    $this->add_member("INDEX($name)");
  }
  
  function add_index_max($name, $max_length) {
    $this->add_member("INDEX($name($max_length))");
  }
  
  function add_primary_key($name) {
    $this->add_member("PRIMARY KEY ($name)");
  }
  
  function create_table() {
    $name = $this->m_name;
    $table_structure = $this->m_output_strings->to_string();
    query_database("CREATE TABLE IF NOT EXISTS $name($table_structure)");
  }
  
  function delete_table() {
    query_database("DROP TABLE " . $this->m_name);
  }
  
  private function add_member($string) {
    if ($this->m_output_strings->number() == 0) {
      $this->m_output_strings->append($string);
    } else {
      $this->m_output_strings->append(", $string");
    }
  }
  
  private $m_output_strings;
  private $m_name;
}