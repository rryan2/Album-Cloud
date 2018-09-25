<?php
$con=mysqli_connect("localhost","root","","technologyonthetrail_db");
if(isset($_POST['done'])){
  $text = $_POST['text'];
  $imageid = $_POST['imageid'];
  mysqli_query($con,"INSERT INTO tags_tbl(name,description,tag_type_ID,additional)
  VALUES ('{$text}','N/A',2,'N/A')");
  $query2 = "SELECT tag_ID FROM tags_tbl WHERE name = '$text'";
  $result2 = mysqli_query($con,$query2) or die ("cannot complete add entry: ".mysqli_error($con));
  $row2 = mysqli_fetch_assoc($result2);
  $tag_ID =   $row2['tag_ID'];
  mysqli_query($con,"INSERT INTO pictures_tags_tbl(pictures_ID,confirmation_state,tag_ID)
  VALUES ('{$imageid}',1,'{$tag_ID}')");
}
?>
