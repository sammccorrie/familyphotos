<?php
//=============================================================================
//
// Class for performing a delete operation on a database
//
//-----------------------------------------------------------------------------

require_once 'database.php';

//=============================================================================
class DeleteQuery {
  
  function __construct($table) {
    $this->m_query = "DELETE FROM ";
    $this->m_query .= "$table ";
    $this->m_where = false;
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
}