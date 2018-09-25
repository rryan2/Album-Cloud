<div id="page-wrapper">

    <div class="row">
        <?php
          /*$query = "SELECT * FROM products_tbl WHERE category = '$category'";*/
          $tfilter = $_GET["tfilter"];
          $userid = $_SESSION['user_id'];
          $query = "SELECT * FROM user_event_tbl WHERE user_ID = '$userid'";
          $result = mysqli_query($db,$query) or die ("cannot complete add entry: ".mysqli_error($db));
          if (mysqli_num_rows($result) == 0) {

    			}//end of if
     			else {
    				while($events = mysqli_fetch_assoc($result)){
    				   // build table to display results
               $event_id  = $events['event_ID'];
               $query2 = "SELECT * FROM event_tbl WHERE event_ID = '$event_id'";
               $result2 = mysqli_query($db,$query2) or die ("cannot complete add entry: ".mysqli_error($db));
               $row = mysqli_fetch_assoc($result2);
               $event_name = $row['name'];
               $event_date = $row['event_date'];
               $now = time();
               $target = strtotime($event_date);
               $diff = $now - $target;
               if($tfilter == 3)
               {
                 if ( $diff > 31556926 ) {
                   echo '<div class="col-lg-3 col-md-4">';
                   echo '<div class="panel-heading">';
                   echo '<div class="row">';
                   echo '<div class="col-xs-6">';
                   echo '<a onclick="return false" ondblclick="location=this.href" href="folder.php?event_ID='.$event_id.'&filter=0"">';
                   echo '<img class="folder" src="../images/Folder-icon.png" width="150" height="150">';
                   echo '</a><p align = "center"> '.$event_name.' </p>';
                   echo ' </div></div> </div></div>';
                 }
               }
               else if($tfilter == 2)
               {
                 if ( $diff >= 7776000 ) {
                   echo '<div class="col-lg-3 col-md-4">';
                   echo '<div class="panel-heading">';
                   echo '<div class="row">';
                   echo '<div class="col-xs-6">';
                   echo '<a onclick="return false" ondblclick="location=this.href" href="folder.php?event_ID='.$event_id.'&filter=0"">';
                   echo '<img class="folder" src="../images/Folder-icon.png" width="150" height="150">';
                   echo '</a><p align = "center"> '.$event_name.' </p>';
                   echo ' </div></div> </div></div>';
                 }
               }
               else if($tfilter == 1)
               {
                 if ( $diff < 7776000 ) {
                   echo '<div class="col-lg-3 col-md-4">';
                   echo '<div class="panel-heading">';
                   echo '<div class="row">';
                   echo '<div class="col-xs-6">';
                   echo '<a onclick="return false" ondblclick="location=this.href" href="folder.php?event_ID='.$event_id.'&filter=0"">';
                   echo '<img class="folder" src="../images/Folder-icon.png" width="150" height="150">';
                   echo '</a><p align = "center"> '.$event_name.' </p>';
                   echo ' </div></div> </div></div>';
                 }
               }
               else {
                 {
                   echo '<div class="col-lg-3 col-md-4">';
                   echo '<div class="panel-heading">';
                   echo '<div class="row">';
                   echo '<div class="col-xs-6">';
                   echo '<a onclick="return false" ondblclick="location=this.href" href="folder.php?event_ID='.$event_id.'&filter=0"">';
                   echo '<img class="folder" src="../images/Folder-icon.png" width="150" height="150">';
                   echo '</a><p align = "center"> '.$event_name.' </p>';
                   echo ' </div></div> </div></div>';
                 }
               }

    				} // end for
    			}//end of else

        ?>

    </div>
    <style type="text/css">
    .folder:hover {
      background-color: rgba(0,0,0,0.02);
    }
    </style>
    <!-- /.row --> <!-- creat folder here -->

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
