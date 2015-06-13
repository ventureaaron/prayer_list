<?php
	require 'pl_login.php';
	echo "<p class='lead'>Add a prayer:</p>";

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
	
	$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_conn) die ("Unable to connect to MySql DB: " . mysqli_error());
	
	$query = "SELECT * FROM prayerlist WHERE status='open'";
	$result = mysqli_query($db_conn,$query);
	if (!$result) die ("Database access failed: ".mysqli_error());
	else if (mysqli_num_rows($result))
        {
	  echo "<p class='lead'>Prayer list:</p>";

          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
          {
          	$pid = $row['pid'];
            $name = $row['name'];
	    $name = htmlentities($name, ENT_QUOTES);
            $date = $row['date'];
            $description = $row['description'];
	    $description = htmlentities($description, ENT_QUOTES);
            $contact = $row['contact'];
	    $contact = htmlentities($contact, ENT_QUOTES);
            $status = $row['status'];
            echo "<div class='statement well'>";
			echo "	<center><form class='form-inline' role='form' action='' method='post'>";
			echo "	<div class='form-group'>";
			echo "	<label for='$pid"."name'>Name:</label>";
			echo "	<input type='input' class='form-control' id='$pid"."name' placeholder='$name'>";			
			echo '	</div>';

			echo '	<div class="form-group">';
			echo "	<label for='$pid"."desc'>Description:</label>";
			echo "	<textarea type='input' class='form-control' id='$pid"."desc' placeholder='$description' size='500' maxlength='500'></textarea>";
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
