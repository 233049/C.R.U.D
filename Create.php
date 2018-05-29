<?php
//create.php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
	require_once 'login.php';
	
	$Game = $_POST["Game"];
	$Cost = $_POST["Cost"];
	$Genre = $_POST["Genre"];
	$Rating = $_POST["Rating"];
	

	$mysqli = new mysqli($mysql_host, 'currymuncher', 'Maroon345', 'Xbox');
	

	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   
	
		$statement = $mysqli->prepare("INSERT INTO games (Game, Cost, Genre, Rating) VALUES(?, ?, ?, ?)"); 
		
		$statement->bind_param('ssss', $Game, $Cost, $Genre, $Rating); 
		if($statement->execute())
			{
				//print output text
				echo nl2br($Game . " Costs ". $Cost.  ", is rated ". $Rating .", and is in the ". $Genre. " category");
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}

echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";
         }
else{
    echo ("error");
    }          
?>