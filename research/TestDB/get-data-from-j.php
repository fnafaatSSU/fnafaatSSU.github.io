<?php  
   		
try{
		
		$connection_string = "mysql:host=localhost;dbname=lsreeramareddy";
		$db_user = "Sree";
		$db_pwd = "ITE320";
		
		$conn_pdo = new PDO($connection_string,$db_user,$db_pwd);
		$conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// write your sql query
		$sqlqry="SELECT * FROM J";
		// use connection with PDO prepared statements
        $statement = $conn_pdo->prepare($sqlqry);
	   // execute
	    $statement->execute();

	// fetch row of data from table as associative array: key and value pairs
		$arrValues = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo "<b>Here is the data from the J table, Fetched using PDO Associative Array</b>";
		echo "<br><hr>";
		// open the table
		echo "<table wdith=\"100%\" border=\"2px\">\n";
		echo "<tr>\n";
		// add the table headers
		foreach ($arrValues[0] as $key => $useless){
			echo "<th>$key</th>";
		}
		echo "</tr>";
	// display data
	foreach ($arrValues as $row){
		echo "<tr>";
    foreach ($row as $key => $val){
        echo "<td>$val</td>";
    }
    echo "</tr>\n";
	}
	// close the table
	echo "</table>\n";
	echo "<br><hr>";
	echo "<a href=\"https://weblab.salemstate.edu/~Sree/home-page-for-sample-db.php\">Back to Home </a>";
	

 // close database connection
	$conn_pdo=null;
}
catch (PDOException $e){
    die($e->getMessage());
}

?>
