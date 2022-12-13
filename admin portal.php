<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="style.css" />

    <title>Event Finder</title>

</head>

    <div class="navbar">

        <ul>

            <li><a href="#">Admin Portal</a></li>

        </ul>

    </div>

    <div class="events">
  <form>
    <input name="eventName" placeholder="Event Name" required="" type="text" />
    <input name="eventType" placeholder="Event Type (Sports, Concert, etc.)" required="" type="text" />
    <label for="eventDate">Event date</label> <span id="date-format"></span>
    <input name = "eventDate" type="date" id="date" placeholder= "Event Date" aria-describedby="date-format"/>
    <label for="time">Event time</label>
    <input name="eventTime" id="time" placeholder="Event Time" required="" type="time" />
    <input name="ticketPrice" placeholder="Ticket Price" required="" type="text" />
    <input name="ticketLink" placeholder="Ticket Information Link" required="" type="text" />
    <input name="address" placeholder="Address" required="" type="text" />
    <input name="city" placeholder="City" required="" type="text" />
    <input name="state" placeholder="State" required="" type="text" />
    <input name="zip" placeholder="Zip Code" required="" type="text" />
    <input type="submit" class="button" value="Add Event">
  </form>
    </div>
    
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

if (isset ($_GET['eventName'] ) || isset ($_GET['eventType'] ) || isset ($_GET['eventDate'] ) || isset ($_GET['eventTime'] ) || isset ($_GET['ticketPrice']  ) || isset ($_GET['ticketLink'] ) || isset ($_GET['address'] ) || isset ($_GET['city'] ) || isset ($_GET['state'] ) || isset ($_GET['zip'] ))
{
$insert_query1 = "INSERT INTO EVENTS (EVENT_NAME, EVENT_TYPE, EVENT_DATE, EVENT_TIME) VALUES( \"" . $_GET['eventName'] . "\",\"" . $_GET['eventType'] . "\",\"" . $_GET['eventDate'] ."\",\"" . $_GET['eventTime'] ."\");";
$result = $conn->query($insert_query1);
    
$insert_query2 = "INSERT INTO TICKETS (TICKET_PRICE, TICKET_LINK) VALUES( \"" . $_GET['ticketPrice'] . "\",\"" . $_GET['ticketLink'] ."\");";
$result = $conn->query($insert_query2);
    
$insert_query3 = "INSERT INTO LOCATION (ADDRESS, CITY, STATE, ZIP) VALUES( \"" . $_GET['address'] . "\",\"" . $_GET['city'] . "\",\"" . $_GET['state'] ."\",\"" . $_GET['zip'] ."\");";
$result = $conn->query($insert_query3);
    
}

if (isset ($_GET['delete_id'] )){
$delete_query = "DELETE FROM EVENTS WHERE EVENT_ID=" . $_GET['delete_id'] . ";";
$result = $conn->query($delete_query);
$delete_query = "DELETE FROM TICKETS WHERE TICKET_ID=" . $_GET['delete_id'] . ";";
$result = $conn->query($delete_query);
$delete_query = "DELETE FROM LOCATION WHERE LOCATION_ID=" . $_GET['delete_id'] . ";";
$result = $conn->query($delete_query);
echo "Deleted user " .$_GET['delete_id'] . "</br>";
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