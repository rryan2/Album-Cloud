<?php
$con=mysqli_connect("localhost","root","","technologyonthetrail_db");
if(isset($_POST['done1'])){
  $public = $_POST['public'];
  $imageid = $_POST['imageid'];
  mysqli_query($con,"UPDATE pictures_tbl
SET share = {$public}
WHERE picture_ID = $imageid;");
}
?>
