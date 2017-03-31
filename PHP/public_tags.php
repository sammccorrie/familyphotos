<?php 
require_once 'variables.php';

$database = mysqli_connect("localhost", "familyphotos", "charlie");
$database->select_db("familyphotos");


if (is_post("newtag")) {
  echo post("newtag");
  return;
}

http_response_code(400);
?>