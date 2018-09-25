<?php require_once "import.php";
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

	   <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?tfilter=0">HCI Capstone: TrailBuddy<span class="alert alert-info"><?php echo $user_login_f_name. " ".$user_login_l_name;?></span>
				</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->



			<!-- sidebar nav start -->
			  <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li class="sidebar-search">
                                      <div class="input-group custom-search-form">
                                          <input id = "sear" type="text" class="form-control" placeholder="Search...">
                                          <span class="input-group-btn">
                                          <button class="btn btn-default" href ="index.php "type="button" onclick="a()">
                                            <script>
                                            function a(){
                                              var k  = document.querySelector("#sear");
                                              var a  = "searching.php?<?php echo "filter=0&";
                                              if(isset($_GET["event_ID"]))
                                              {
                                                $event_ID = $_GET["event_ID"];
                                                echo "event_ID=$event_ID&filter=0&";
                                              }
                                               ?>" + 'tag=' + k.value;
                                            location.href = a;
                                            }
                                            </script>
                                              <i class="fa fa-search"></i>
                                          </button>
                                      </span>
                                      </div>
                                      <!-- /input-group -->
                                  </li>
                        <li>
                            <a href="index.php?tfilter=0"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li> <!-- start of Menu A -->
                            <a href="#">Filter events by timeline<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <li>
                                       <a href="index.php?<?php
                                         echo "&tfilter=1";
                                        ?>">Recent</a>
                              </li>
																<li>
                                  <a href="index.php?<?php
                                    echo "&tfilter=2";
                                   ?>">Three month ago</a>
                                </li>
																<li>
                                  <a href="index.php?<?php
                                    echo "&tfilter=3";
                                   ?>">One year ago</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
						             </li>  <!-- end of Menu A -->
                         <li> <!-- start of Menu A -->
                             <a href="#">Filter photos by visibility<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                               <li>
                                        <a href="<?php echo $actual_link;?>&<?php echo "tfilter=0&filter=0";
                                         ?>">ALL photos</a>
                               </li>
                                 <li>
 								 	                        <a href="<?php echo $actual_link;?>&<?php echo "tfilter=0&filter=1";
                                           ?>">Photos took by me</a>
                                 </li>
                                 <li>
                                          <a href="<?php echo $actual_link;?>&<?php echo "tfilter=0&filter=2";
                                          ?>">Photos took by others</a>
                                 </li>
                             </ul>
                             <!-- /.nav-second-level -->
 						             </li>  <!-- end of Menu A -->



					</ul> <!-- /id=side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>


			<!-- sidebar nav  end -->



            <!-- /.navbar-static-side -->
        </nav>
