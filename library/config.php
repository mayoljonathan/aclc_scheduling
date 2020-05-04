<?php session_start(); ?>
<?php ob_start(); ?>
<?php 
	error_reporting(0);
	
	$ServerName = "localhost";
	$Username	= "root";
	$Password	= "";
	$DbName		= "db_aclcscheduling";
	$dbConn = null;

	try {
		$dbConn = new PDO("mysql:host=$ServerName;dbname=$DbName",$Username,$Password);
		$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected Successfully";
	} catch (PDOException $e) {
		echo "Connection Failed:" . $e->getMessage();
		die();
	}

	
 ?>