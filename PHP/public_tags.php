<?php 
require_once 'tagsmanager.php';
require_once 'variables.php';

login_database();

if (is_post("newtag")) {
  $tag_manager = new TagsManager();
  $id = $tag_manager->add_tag(post("newtag"));
  echo $id;
  return;
}

http_response_code(400);
?>