<?php
	require 'pl_login.php';

	//add prayer section at top
	echo "<div class='statement well'>";
	echo "	<center><form class='form-inline' role='form' action='' method='post'>";
	echo "	<div class='form-group'>";
	echo "	<label for='name'>Name:</label>";
	echo "	<input type='input' class='form-control' id='name' placeholder='Who?'>";
	echo '	</div>';
	echo '	<div class="form-group">';
	echo "	<label for='desc'>Description:</label>";
	echo "	<input type='input' class='form-control' id='desc' placeholder='What?'>";
	echo '	</div>';
	echo '	<div class="form-group">';
	echo "	<label for='cont'>Contact:</label>";
	echo "	<input type='input' class='form-control' id='cont' placeholder='Update contact.'>";
	echo '	</div>';
	echo "  <div class='form-group'>";
	echo "  <label for='status'>Status:</label>";
	echo "  <select class='form-control' id='status'>";
	echo "  <option>OPEN</option>";
	echo "  <option>CLOSE</option>";
	echo "  </select>";
	echo "  </div>";
	echo "	<button class='btn btn-default' id='add' value='Add'>Add</button>";
	echo '	</form></center>';
	echo "</div>";
	
	$db_conn = mysql_connect($db_hostname, $db_username, $db_password);
	if (!$db_conn) die ("Unable to connect to MySql DB: " . mysql_error());
	mysql_select_db($db_database) or die("Unable to connect to DB: " . mysql_error());
	
	$query = "SELECT * FROM prayerlist WHERE status='open'";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: ".mysql_error());
	else if (mysql_num_rows($result))
        {
          while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
          {
          	$pid = $row['pid'];
            $name = $row['name'];
            $date = $row['date'];
            $description = $row['description'];
            $contact = $row['contact'];
            $status = $row['status'];
            echo "<div class='statement well'>";
			echo "	<center><form class='form-inline' role='form' action='' method='post'>";
			echo "	<div class='form-group'>";
			echo "	<label for='$pid"."name'>Name:</label>";
			echo "	<input type='input' class='form-control' id='$pid"."name' placeholder='$name'>";
			echo '	</div>';
			echo '	<div class="form-group">';
			echo "	<label for='$pid"."desc'>Description:</label>";
			echo "	<input type='input' class='form-control' id='$pid"."desc' placeholder='$description'>";
			echo '	</div>';
			echo '	<div class="form-group">';
			echo "	<label for='$pid"."cont'>Contact:</label>";
			echo "	<input type='input' class='form-control' id='$pid"."cont' placeholder='$contact'>";
			echo '	</div>';
			echo "  <div class='form-group'>";
			echo "  <label for='$pid"."status'>Status:</label>";
			echo "  <select class='form-control' id='$pid"."status'>";
			echo "  <option>OPEN</option>";
			echo "  <option>CLOSE</option>";
			echo "  </select>";
			echo "  </div>";
			echo "	<button class='save btn btn-default' id='$pid' value='Save'>Save</button>";
			echo '	</form></center>';
			echo "</div>";
          }
        }
        else echo "No prayers are currently open.";
	
?>
