<?php
session_start();
include 'pl_login.php';
include 'input_cleaner.php';

if(isset($_POST['pid']))
{
	//
	$pid=$_POST['pid'];
	$pid=string_clean($pid);
	//
	$name=$_POST['name'];
	$name=string_clean($name);
	//
	$desc=$_POST['desc'];
	$desc=string_clean($desc);
	//
	$cont=$_POST['cont'];
	$cont=string_clean($cont);
	//
	$stat=$_POST['stat'];
	$date = date("Y-m-d");
	
	$db_conn = mysql_connect($db_hostname, $db_username, $db_password);
	if (!$db_conn) die ("Unable to connect to MySql DB: " . mysql_error());
	mysql_select_db($db_database) or die("Unable to connect to DB: " . mysql_error());
	
	$query = "UPDATE prayerlist SET name='$name', description='$desc', contact='$cont', date='$date', status='$stat' WHERE pid='$pid'";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: ".mysql_error());
	else echo "success.";
}
?>