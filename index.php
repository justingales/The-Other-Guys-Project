<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="style.css" />

    <title>Database</title>

</head>

<body>

    <div class="navbar">

        <ul>

            <li><a href="#">Home</a></li>

            <li><a href="#">Tickets</a></li>

            <li><a href="#">Events</a></li>

            <li><a href="#">Organizers</a></li>

            <li><a href="#">Users</a></li>

        </ul>

    </div>

    <div class="contact-us">
  <form>
    <input name="fname" placeholder="First Name" required="" type="text" />
    <input name="lname" placeholder="Last Name" required="" type="text" />
    <input type="submit" class="button" value="Add Person">
  </form>
    </div>
    
    <div class="contact-us">
<h1> Current List of People</h1>

<?php

$servername = "localhost";
$username = "user";
$password = "pass";
$dbname = "Event Finder DB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}

// Check to see if fname and lname exist before we insert
if (isset ($_GET['fname'] ) and isset ($_GET['lname'] ))
{
$insert_query = "INSERT INTO people (first_name, last_name) VALUES( \"" . $_GET['fname'] . "\",\"" . $_GET['lname'] . "\");";

$result = $conn->query($insert_query);

}

//
// Check to see if fname and lname exist before we insert
if (isset ($_GET['delete_id'] )){
$delete_query = "DELETE FROM people WHERE person_id=" . $_GET['delete_id'] . ";";
$result = $conn->query($delete_query);
echo "Debug message: deleted user " .$_GET['delete_id'] . "</br>";
}

$select_query = "SELECT * FROM people;";
$result = $conn->query($select_query);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){
    echo $row['first_name'] . " " . $row['last_name'] . " <a href=?delete_id=" . $row['person_id'] . "> X</a> </br>";
  }
}

?>
        </div>
</body>
</html>