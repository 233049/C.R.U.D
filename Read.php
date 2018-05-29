<?php
//read.php
require_once 'login.php';
$conn = mysql_connect('localhost', 'currymuncher', 'Maroon345');
if (! $conn) {
    die("Connection failed: " . mysql_error());
}

	
$sql = "SELECT Game, Cost, Rating, Genre from games";
mysql_select_db('Xbox');
$result = mysql_query( $sql, $conn );

if (! $result) {
    die("Could not get data: " . mysql_error());
}

$Game = $row[0];
$Genre = $row[1];
$Cost = $row[2];
$Rating = $row[3];
// HTML to display the form on this page.
echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H2> These games costs "." ". $_POST['Cost']."</H2>");

	while($row = mysql_fetch_assoc($result))	{
			// The following few lines store information from specific cells in the data about an image
			echo "<TR>";
			echo "<TD>Game: ".$row['Game']. "  Genre: ". $row['Genre']. "  Rating ".$row['Rating'] ."</TD>";
			echo "<TD><form action= 'update.php' method = 'post'>";
			echo "<button name = 'update'   type = 'submit' value =".$row['Game'].">Edit</button></FORM>";
			echo "<TD><form action= 'delete.php' method = 'post'>";
			echo "<button name = 'delete'   type = 'submit' value =".$row['Game'].">Delete</button></FORM>";
			echo "</TR>";
	}
	echo "Fetched data successfully\n";
	
	mysql_close($conn)


?>