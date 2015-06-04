<?php
session_start();
if(!empty($_SESSION['login_user']))
{
	header('Location: prayerlist.php');
}
else {
	include 'pl_head.php';
	
	echo '  <p class="lead">Login Information:</p>';
	echo '	<center><form class="form-inline" role="form" action="" method="post">';
	echo '	<div class="form-group">';
	echo '	<label for="login">Login:</label>';
	echo '	<input type="input" class="form-control" id="login" placeholder="Login name">';
	echo '	</div>';
	echo '	<div class="form-group">';
	echo '	<label for="pwd">Password:</label>';
	echo '	<input type="password" class="form-control" id="pwd" placeholder="Enter password">';
	echo '	</div>';
	echo '	<button class="btn btn-default" id="submit" value="Submit">Submit</button>';
	echo '	<div id="error"></div>';
	echo '	</form></center>';
	
	include 'pl_foot.php';
}
?>