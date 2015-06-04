<?php
session_start();
if(empty($_SESSION['login_user']))
{
	header('Location: pl_auth.php');
}
else {
        $role = $_SESSION['role'];
	include 'pl_head.php';
	
	if($role=="edit") {
		include 'pl_edit.php';
	}
	if($role=="read") {
        	include 'pl_read.php';
	}
        
	include 'pl_foot.php';
}
?>
