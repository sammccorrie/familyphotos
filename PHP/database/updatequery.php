<?php
//=============================================================================
//
// Class for performing an update to a database
//
//-----------------------------------------------------------------------------

require_once 'database.php';

//=============================================================================
class UpdateQuery {
  
  function __construct($table) {
    $this->m_query = "UPDATE ";
    $this->m_query .= "$table ";
    $this->m_where = false;
    $this->m_set = false;
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