<?php
//=============================================================================
//
// Class for performing a selection from a database
//
//-----------------------------------------------------------------------------

require_once 'database.php';

//=============================================================================
class InsertQuery {
  
  function __construct($table) {
    $this->m_query = "INSERT INTO ";
    $this->m_query .= "$table ";
    $this->m_query .= "VALUES(";
    $this->m_value = false;
  }
  
  function value($value) {
    if ($this->m_value) {
      $this->m_query .= ", ";
    }
    $this->m_value = true;
    $this->m_query .= "'$value'";
  }
  
  function null_value() {
    if ($this->m_value) {
      $this->m_query .= ", ";
    }
    $this->m_value = true;
    $this->m_query .= "NULL";
  }
  
  function query() {
    $this->m_query .= ")";
    return query_database($this->m_query);
  }
  
  function query_string() {
    return $this->m_query;
  }
  
  private $m_query;
  private $m_value;
}
