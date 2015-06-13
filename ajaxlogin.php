<?php
session_start();
include 'pl_login.php';
include 'input_cleaner.php';

if(isset($_POST['login']) && isset($_POST['pwd']))
{
	// username and password sent from Form
	$login=$_POST['login'];

	$pwd = $_POST['pwd'];

	$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_conn) die ("Unable to connect to MySql DB: " . mysqli_error());

	$login=string_clean($db_conn, $login);
	$pwd=string_clean($db_conn, $pwd);

		
	$query = "SELECT * FROM pl_user WHERE userid='$login' and password='$pwd'";
	$result = mysqli_query($db_conn,$query);
	if (!$result) die ("Database access failed: ".mysqli_error());
	
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	// If result matched $username and $password, table row  must be 1 row
	if($count==1)
	{
		$_SESSION['login_user']=$row['userid']; //Storing user session value.
		$_SESSION['role']=$row['role'];
		echo $row['userid'];
	}

}
?>