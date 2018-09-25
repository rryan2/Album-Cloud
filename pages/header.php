<?php
$profpic = "../images/back.jpeg";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <div class="blackBar">
    <p><font color="white" size = 6 style="font-family:courier;">TrailBuddy</font></p>
  </div>

  <style type="text/css">
  html {
    height: 100%;
  }
  body {
    min-height: 100%;
  }
  body {
    background-image: url('<?php echo $profpic;?>');
    height: 100%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size:100% 100%;
  }
  .blackBar{
   position:fixed;
   top:0;
   left:0;
   width:100%;
   height:60px;
   background-color:black;
}
  </style>
</head>
</html>
