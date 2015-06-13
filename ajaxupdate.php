<?php
session_start();
include 'pl_login.php';
include 'input_cleaner.php';

if(isset($_POST['pid']))
{
	//
	$pid=$_POST['pid'];
	//
	$name=$_POST['name'];
	//
	$desc=$_POST['desc'];
	//
	$cont=$_POST['cont'];
	//
	$stat=$_POST['stat'];
	$date = date("Y-m-d");
	
	$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_conn) die ("Unable to connect to MySql DB: " . mysqli_error());

	$pid=string_clean($db_conn, $pid);
	$name=string_clean($db_conn, $name);
	$desc=string_clean($db_conn, $desc);
	$cont=string_clean($db_conn, $cont);

	
	$query = "UPDATE prayerlist SET name='$name', description='$desc', contact='$cont', date='$date', status='$stat' WHERE pid='$pid'";
	$result = mysqli_query($db_conn,$query);
	if (!$result) die ("Database access failed: ".mysqli_error());
	else echo "success.";
}
?>