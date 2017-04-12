<?php 
require_once 'PHP/tagsmanager.php';

login_database();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <meta id="port" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="For storing family photos.">
    <title>Family Photos</title>
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--Add a favicon here-->
    <!--Choose a font if you want one-->
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
      $(document).ready(function() {

        // Handle form subission for new tags
        $("#tag_form").submit(function(event) {
          event.preventDefault();
          submit_tag();
        });

        // Handle the add tag button
        $('#add_tag_button').click(function() {
          var id = $('#tag_select').val();
          var name = $('#tag_select option:selected').text();
          $('#new_photo_tags').append('<p>' + name + '</p>');
          $("#tag_select option[value='" + id + "']").remove();
        });
      });

      function submit_tag() {
        var tag_name = $("#newtagname").val();
        if (tag_name == "") {
          alert("Nothing Entered");
          return;
        }
        var data = {
          newtag: tag_name
        };
        $.post("PHP/public_tags.php", data).success(function() {
          
        });
      };
    </script>
  </head>
  <body>
    <h1>Family Photos</h1>
    <p>New Tag Form</p>
    <form id="tag_form">
      <p>Tag Name</p>
      <input id="newtagname" type="text" name="tagname">
      <button>Submit</button>
    </form>
    <br>
    <br>
    <p>New Photo Form</p>
    <form id="photo_form">
    	<p>Photo</p>
    	<input id="newphoto" type="file">
    	<p>Tags</p>
    	<select id='tag_select'> 
<?php 
	$tags_manager = new TagsManager();
	$tags = $tags_manager->get_tags();
	while ($tag = mysqli_fetch_assoc($tags)) {
		$id = $tag["id"];
		$name = $tag["tag"];
		echo "<option value='$id'>$name</option>";
	}
?>
    	</select>
    	<button type='button' id='add_tag_button'>Add Tag</button>
    	<div id='new_photo_tags'></div>
    	<button>Submit</button>
    </form>
  </body>
</html>