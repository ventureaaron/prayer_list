<?php
session_start();
include 'pl_login.php';
include 'input_cleaner.php';

if(isset($_POST['login']) && isset($_POST['pwd']))
{
	// username and password sent from Form
	$login=$_POST['login'];
	$login=string_clean($login);
	//$login="edit";
	$pwd = $_POST['pwd'];
	//Here converting passsword into MD5 encryption. 
	$pwd=string_clean($pwd);
	$db_conn = mysql_connect($db_hostname, $db_username, $db_password);
	if (!$db_conn) die ("Unable to connect to MySql DB: " . mysql_error());
	mysql_select_db($db_database) or die("Unable to connect to DB: " . mysql_error());
	
	$query = "SELECT * FROM pl_user WHERE userid='$login' and password='$pwd'";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: ".mysql_error());
	
	$count=mysql_num_rows($result);
	$row=mysql_fetch_array($result,MYSQL_ASSOC);
	// If result matched $username and $password, table row  must be 1 row
	if($count==1)
	{
		$_SESSION['login_user']=$row['userid']; //Storing user session value.
		$_SESSION['role']=$row['role'];
		echo $row['userid'];
	}

}
?>