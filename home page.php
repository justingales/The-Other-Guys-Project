<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="style.css" />

    <title>Event Finder</title>

</head>

    <div class="navbar">

        <ul>

            <li><a href="#">Event Finder</a></li>

        </ul>

    </div>
    

	<form name="form1" method="get" action="search.php">
		<input type="text" placeholder="Search" name="search" aria-label="Search" required>
		<input type="submit" value="Search" name="submit">
	</form>

    
    <div class="events">
<h1>Events</h1> 

<?php

$servername = "localhost";
$username = "user";
$password = "pass";
$dbname = "EventFinder";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}

    
$select_query = "SELECT * FROM TICKETS JOIN EVENTS JOIN LOCATION";
$result = $conn->query($select_query);
if ($result->num_rows > 0) {
echo "<table border='3'>

<tr>
<th>Event Name</th>
<th>Event Type</th>
<th>Event date</th>
<th>Event Time</th>
<th>Ticket Price</th>
<th>Ticket Link</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip Code</th>
<th>Delete row</th>
</tr>";
      
while($row = $result->fetch_assoc())

  {
  echo "<tr>";
  echo "<td>" . $row['EVENT_NAME'] . "</td>";
  echo "<td>" . $row['EVENT_TYPE'] . "</td>";
  echo "<td>" . $row['EVENT_DATE'] . "</td>";
  echo "<td>" . $row['EVENT_TIME'] . "</td>";
  echo "<td>" . $row['TICKET_PRICE'] . "</td>";
  echo "<td>" . $row['TICKET_LINK'] . "</td>";
  echo "<td>" . $row['ADDRESS'] . "</td>";
  echo "<td>" . $row['CITY'] . "</td>";
  echo "<td>" . $row['STATE'] . "</td>";
  echo "<td>" . $row['ZIP'] . "</td>";
  echo "<td>" . " <a href=?delete_id=" . $row['EVENT_ID'] . "> X</a> </br>" . "</td>";
  echo "</tr>";
}
    echo "</table>";
    }
?>
        </div>
</html>