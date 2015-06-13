<?php
	require 'pl_login.php';

	$db_conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_conn) die ("Unable to connect to MySql DB: " . mysqli_error());
	
	$query = "SELECT * FROM prayerlist WHERE status='open'";
	$result = mysqli_query($db_conn,$query);
	if (!$result) die ("Database access failed: ".mysqli_error());
	else if (mysqli_num_rows($result))
        {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
          {
            $name = $row['name'];
            $date = $row['date'];
            $description = $row['description'];
            $contact = $row['contact'];
            $status = $row['status'];
            echo "<div class='well statement alert-info'>";
            echo "<p>$name :</p>";
            echo "<p>$description</p>";
            echo "<p>$date</p>";
            echo "<p>Contact: $contact</p>";
            echo "</div>";
          }
        }
        else echo "No prayers are currently open.";
	
?>
