    <HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")	//Check it is coming from a form
    {
        require_once 'login.php';				//mysql credentials

	    //delcare PHP variables
	    $Game = $_POST["Game"];
	    $Genre = $_POST["Genre"];			//The values in the $_POST must match the names given from the HTML document
	    $Cost = $_POST["Cost"];
	    $Rating = $_POST["Rating"];
	    
        $mysqli = new mysqli($mysql_host, 'currymuncher', 'Maroon345', 'Xbox');
        if ($mysqli->connect_error) 
            {
		        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	        }   
        if ($_POST['Genre']!= "")
            {
                
	
		$statement = $mysqli->prepare("UPDATE student SET Game= ?, Cost=?, Genre=? Rating = ?"); //prepare sql insert query - thank you(https://stackoverflow.com/questions/6514649/php-mysql-bind-param-how-to-prepare-statement-for-update-query)
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('ssss', $Game, $Cost, $Genre, $Rating); //bind value
		if($statement->execute())
			{
					//print output text
				echo nl2br("You have updated "." ". $Genre . "'s information to;\r\n Class " . $Cost." ". $Rating ."th Rating.", false);
			}
			else{
					print $mysqli->error; //show mysql error if any 
		
		
			}
        echo"Hi"; 
    }        
echo"<br><form action= 'update.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form></body>";
?>
