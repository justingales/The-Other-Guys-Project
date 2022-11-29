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

if (isset ($_GET['eventName'] ) || isset ($_GET['eventType'] ) || isset ($_GET['eventDate'] ) || isset ($_GET['eventTime'] ))
{
$insert_query = "INSERT INTO Events (EVENT_NAME, EVENT_TYPE, EVENT_DATE, EVENT_TIME) VALUES( \"" . $_GET['eventName'] . "\",\"" . $_GET['eventType'] . "\",\"" . $_GET['eventDate'] ."\",\"" . $_GET['eventTime'] ."\");";
$result = $conn->query($insert_query);

}

if (isset ($_GET['delete_id'] )){
$delete_query = "DELETE FROM EVENTS WHERE EVENT_ID=" . $_GET['delete_id'] . ";";
$result = $conn->query($delete_query);
echo "Deleted user " .$_GET['delete_id'] . "</br>";
}

$select_query = "SELECT * FROM EVENTS;";
$result = $conn->query($select_query);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
    echo $row['EVENT_NAME'] . " " . $row['EVENT_TYPE'] . " " . $row['EVENT_DATE'] . " " . $row['EVENT_TIME'] ." <a href=?delete_id=" . $row['EVENT_ID'] . "> X</a> </br>";
  }
}

?>
        </div>
</html>