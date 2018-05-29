<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: Table.html');
        exit;   
    }
else
    {
        echo $Game;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = mysql_connect('localhost', 'currymuncher', 'Maroon345');
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT Game, Cost, Rating, Genre from games";
        mysql_select_db('Xbox');
        $result = mysql_query( $sql, $conn );

        $Game = $row[0];
        $Genre = $row[1];
        $Cost = $row[2];
        $Rating = $row[3];
        

                while($row = mysql_fetch_assoc($result)){
		            
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['Genre'].".";
                        echo "<TR>";
	                    echo "<TD>".$row['Game']. "</TD><TD>". $row['Genre']. "</TD><TD>". $row['Cost']. "</TD><TD>".$row['Rating'] ."</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = Game value=".$row['Game']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Genre' name='Genre' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='Cost'>";
                        echo "<option value='0-9.99' >0-9.99</option>";
                        echo "<option value='10-19.99' >10-19.99</option>";
                        echo "<option value='20-29.99' >20-29.99</option>";
                        echo "<option value='30-39.99' >30-39.99</option>";
                        echo "<option value='40-49.99' >40-49.99</option>";
                        echo "<option value='>50' >50</option>";
                        echo "</select></TD>";
                        echo "<TD><input type= 'text' name='Rating' placeholder='Rating'>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }

?>
</HTML>