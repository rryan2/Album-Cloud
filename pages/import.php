<?php
    session_start();
	if(!isset($_SESSION['user_id'])){

       header("location: login.php");
    }



	$user_login_id =	$_SESSION['user_id'];
	$user_login_f_name = 	$_SESSION['f_name'];
	$user_login_l_name = 	$_SESSION['l_name'];
	$user_login_role_ref_id = $_SESSION['role_ref_id'];

    include ("constants.php");
    include("connect.php");

?>
