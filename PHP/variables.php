<?php 
function post($name) {
  if (is_post($name)) {
  	return $_POST[$name];
  }
  return "";
}
function is_post($name) {
  return isset($_POST[$name]);
}
?>