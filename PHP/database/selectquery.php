<?php
//=============================================================================
//
// Class for performing a selection from a database
//
//-----------------------------------------------------------------------------

require_once 'database.php';

//=============================================================================
class SelectQuery {
  
  function __construct($types) {
    $this->m_query = "SELECT $types FROM ";
    $this->m_where = false;
    $this->m_set = false;
  }
  
  function set_table($table) {
    $this->m_query .= "$table ";
  }
  
  function set($key, $value) {
    if ($this->m_set) {
      $this->m_query .= ", $key='$value' ";
    } else {
      $this->m_set = true;
      $this->m_query .= "SET $key='$value' ";
    }
  }
  
  function where($key, $value) {
    if (!$this->m_where) {
      $this->m_query .= "WHERE";
      $this->m_where = true;
    } else {
      $this->m_query .= " AND";
    }
    $this->m_query .= " $key='$value'";
  }
  
  function order_descending($parameter) {
    $this->m_query .= " ORDER BY $parameter DESC";
  }
  
  function limit($number) {
    $this->m_query .= " LIMIT $number";
  }
  
  function double_limit($start, $end) {
    $this->m_query .= " LIMIT $start,$end";
  }
  
  function query() {
    return query_database($this->m_query);
  }
  
  function query_string() {
    return $this->m_query;
  }
  
  private $m_query;
  private $m_where;
  private $m_set;
}