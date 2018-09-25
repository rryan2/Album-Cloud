<?php

	include 'header.php';
	include("constants.php");
    include("secure.php");
    // get posted variables if form was posted
    if(!isset($_POST['email'])){
        header("location: index.php");
    }
    $email = strtolower(sanitize($_POST['email']));
    $pword = ($_POST['password']);
    if(isset($_POST['remember'])) {
        $remember = $_POST['remember'];
    }else{
        $remember = "";
    }
    $passwd = $_POST['password'];


	require_once("connect.php");
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($db,$query) or die ("cannot get users: ".mysqli_error($db));

	if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_array($result);

		if($user['active']== 1){
			if($user['password']== $pword){

				$login_action = $LOG_IN_SUCCESS;//change
				$user_id = $user['user_ID'];

				// the code below would be used to track login attempts
				/*

				$query_action_log = "INSERT INTO user_action_log
									(user_action_log_ID, user_action_type_ref_ID, details, user_ID)
									VALUES
									(NULL, $login_action, 'Login Success',  $user_id);";


				$result_action_log = mysqli_query($db,$query_action_log) or die ("cannot complete add entry: ".mysqli_error($db));
				*/

				session_start();
				$_SESSION['user_id'] = $user['user_ID'];
				$_SESSION['f_name'] = $user['f_name'];
				$_SESSION['l_name'] = $user['l_name'];
				$_SESSION['role_ref_id'] = $user['role_ref_ID'];
				// print_r($_SESSION);
				header("Location: index.php?tfilter=0");
			}
			else{
				$login_action = $LOG_IN_FAIL;

				// the code below would be used to track login attempts
				/*
				$user_id = $user['user_ID'];
				$query_action_log = "INSERT INTO user_action_log
									(user_action_log_ID, user_action_type_ref_ID, details, user_ID)
									VALUES
									(NULL, $login_action, 'Login Fail',  $user_id);";

				$result_action_log = mysqli_query($db,$query_action_log) or die ("cannot complete add entry: ".mysqli_error($db));
				*/
			}

		}


    }


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HCI Capstone: TrailBuddy</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Invalid email address or password provided</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="process_login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>

                                </div>

                                <input type = "submit" class="btn btn-lg btn-success btn-block"></a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
