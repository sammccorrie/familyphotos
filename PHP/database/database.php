<?php
//=============================================================================
//
// Functions for working with the database
//
//-----------------------------------------------------------------------------

$database = null;
$database_host = "localhost";
$database_user = "familyphotos";
$database_password = "charlie";
$database_name = "familyphotos";

//=============================================================================
//
// Login to the mysql database
// Return whether we succeeded or not
//
//-----------------------------------------------------------------------------
function login_database()
{
  global $database_host;
  global $database_user;
  global $database_name;
  global $database_password;
  global $database;
  
  $database = mysqli_connect($database_host, $database_user, $database_password);
  if (!$database) {
    return FALSE;
  }
  if (!$database->select_db($database_name)) {
    return FALSE;
  }
  
  return TRUE;
}

//=============================================================================
//
// Query the database
//
//-----------------------------------------------------------------------------
function query_database($query)
{
  global $database;
  $result = $database->query($query) or die(mysqli_error($database));
  return $result;
}
