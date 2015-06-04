<?php
	require 'pl_login.php';

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
