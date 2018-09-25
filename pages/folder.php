<?php

    // allow only logged in users
   require_once "import.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="../gallery/css/lc_lightbox.css" />
    <link rel="stylesheet" href="../gallery/skins/minimal.css" />
    <style type="text/css">
    .lcl_fade_oc.lcl_pre_show #lcl_overlay,
    .lcl_fade_oc.lcl_pre_show #lcl_window,
    .lcl_fade_oc.lcl_is_closing #lcl_overlay,
    .lcl_fade_oc.lcl_is_closing #lcl_window {
      opacity: 0 !important;
    }
    .lcl_fade_oc.lcl_is_closing #lcl_overlay {
      -webkit-transition-delay: .15s !important;
      transition-delay: .15s !important;
    }
    </style>
    <title>HCI Capstone - Technology on the Trail</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?php include "navigation.php" ?>
<!-- insert HERE DEREK -->
<div id="page-wrapper">

    <!-- /.row --> <!-- creat folder here -->
    <?php
    include 'connect.php';

    function structtags($id,$tagname)
    {
      include 'connect.php';
      $query = "SELECT * FROM pictures_tags_tbl WHERE pictures_ID = '$id'";
      $result = mysqli_query($db,$query) or die ("cannot complete add entry: ".mysqli_error($db));
        while($row = mysqli_fetch_assoc($result)){
          $tagid = $row['tag_ID'];
          $query2 = "SELECT name FROM tags_tbl WHERE tag_ID = '$tagid'";
          $result2 = mysqli_query($db,$query2) or die ("cannot complete add entry: ".mysqli_error($db));
          $row2 = mysqli_fetch_assoc($result2);
          $tagbuild = $row2['name'];
          $tagname = "$tagbuild,$tagname";
        }
        return $tagname;
    }

    function imageview(){
      include 'connect.php';
      //$userid = $_SESSION['user_id'];
      $userid = $_SESSION['user_id'];
      $event_id = $_GET["event_ID"];
      $filter = $_GET["filter"];
      $query = "SELECT * FROM pictures_tbl WHERE event_ID = '$event_id'";
      $result = mysqli_query($db,$query) or die ("cannot complete add entry: ".mysqli_error($db));
      if (mysqli_num_rows($result) == 0) {
        echo 'It seems like you need to take some photos';
      }//end of if
      else {
        while($row = mysqli_fetch_assoc($result)){
          $owner_ID = $row['owner_ID'];
          $shared = $row['share'];
          if($filter == 1)
          {
            if(($userid == $owner_ID))
            {
              $isowner = 1;
              $query2 = "SELECT * FROM users WHERE user_ID = '$owner_ID'";
              $result2 = mysqli_query($db,$query2) or die ("cannot complete add entry: ".mysqli_error($db));
              $row2 = mysqli_fetch_assoc($result2);
              $fname = $row2 ['f_name'];
              $lname = $row2 ['l_name'];
              $name = $row['name'];
              $imageFileNameAndLoc = $row['filePath'];
              $picID = $row['picture_ID'];
              $tagname = "";
              $tags = structtags($picID,$tagname);;
              $a = "nothingasd";
              echo '<div class="col-lg-3 col-md-4">';
              echo '<div class="panel-heading">';
              echo '<div class="row">';
              echo '<div class="col-xs-6">';
              echo '<a id = "ima" class="elem" href="../'.$imageFileNameAndLoc.'" ispublic = "'.$shared.'"isowner = "'.$isowner.'" tags = "'.$tags.'" imageid= "'.$picID.'" title="'.$name.'" data-lcl-txt="nothing" data-lcl-author=" '.$fname.' '.$lname.'" >';
              echo '<img src="../'.$imageFileNameAndLoc.'" width="200" height="150">';
              echo '</a><p align = "center"> '.$name.' </p>';
              echo ' </div></div> </div></div>';
            }
          }
          if($filter == 2)
          {
            if(($userid != $owner_ID)&& $shared == 1)
            {
              $isowner = 0;
              $query2 = "SELECT * FROM users WHERE user_ID = '$owner_ID'";
              $result2 = mysqli_query($db,$query2) or die ("cannot complete add entry: ".mysqli_error($db));
              $row2 = mysqli_fetch_assoc($result2);
              $fname = $row2 ['f_name'];
              $lname = $row2 ['l_name'];
              $name = $row['name'];
              $imageFileNameAndLoc = $row['filePath'];
              $picID = $row['picture_ID'];
              $tagname = "";
              $tags = structtags($picID,$tagname);;
              $a = "nothing";
              echo '<div class="col-lg-3 col-md-4">';
              echo '<div class="panel-heading">';
              echo '<div class="row">';
              echo '<div class="col-xs-6">';
              echo '<a id = "ima" class="elem" href="../'.$imageFileNameAndLoc.'" ispublic = "'.$shared.'"isowner = "'.$isowner.'" tags = "'.$tags.'" imageid= "'.$picID.'" title="'.$name.'" data-lcl-txt="nothing" data-lcl-author=" '.$fname.' '.$lname.'" >';
              echo '<img src="../'.$imageFileNameAndLoc.'" width="200" height="150">';
              echo '</a><p align = "center"> '.$name.' </p>';
              echo ' </div></div> </div></div>';
            }
          }
          if ($filter == 0) {
            if(($userid == $owner_ID)|| $shared == 1)
            {
              $isowner = 0;
              if($userid == $owner_ID)
              {
                $isowner = 1;
              }
              $query2 = "SELECT * FROM users WHERE user_ID = '$owner_ID'";
              $result2 = mysqli_query($db,$query2) or die ("cannot complete add entry: ".mysqli_error($db));
              $row2 = mysqli_fetch_assoc($result2);
              $fname = $row2 ['f_name'];
              $lname = $row2 ['l_name'];
              $name = $row['name'];
              $imageFileNameAndLoc = $row['filePath'];
              $picID = $row['picture_ID'];
              $tagname = "";
              $tags = structtags($picID,$tagname);;
              $a = "nothing";
              echo '<div class="col-lg-3 col-md-4">';
              echo '<div class="panel-heading">';
              echo '<div class="row">';
              echo '<div class="col-xs-6">';
              echo '<a id = "ima" class="elem" href="../'.$imageFileNameAndLoc.'" ispublic = "'.$shared.'"isowner = "'.$isowner.'" tags = "'.$tags.'" imageid= "'.$picID.'" title="'.$name.'" data-lcl-txt="nothing" data-lcl-author=" '.$fname.' '.$lname.'" >';
              echo '<img src="../'.$imageFileNameAndLoc.'" width="200" height="150">';
              echo '</a><p id = "edit" align = "left"> '.$name.'</p>';
              echo ' </div></div> </div></div>';
            }
          }

           // build table to display results

        } // end for
      }//end of else
    }
    imageview();
    ?>

    <!-- /.row -->
</div>





    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
  	<script src="../gallery/js/lc_lightbox.lite.js" type="text/javascript"></script>
  	<!-- ASSETS -->
  	<script src="../gallery/lib/AlloyFinger/alloy_finger.min.js" type="text/javascript"></script>
  	<script type="text/javascript">
  		$(document).ready(function(e) {
  			// live handler
  			lc_lightbox('.elem', {
  				wrap_class: 'lcl_fade_oc',
  				gallery : true,
  				thumb_attr: 'data-lcl-thumb',

  				skin: 'minimal',
  				radius: 0,
  				padding	: 0,
  				border_w: 0,
  			});

  		});
  	</script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>

</html>
