<?php
// pdo-insert-j.php
//echo "inside pdo";
if((isset($_POST['jnum']) &&($_POST['jname']) &&($_POST['jcity'])))
{
    //echo "inside if statement";
$jnumvalue = $_POST['jnum'];
$jnamevalue = $_POST['jname'];
$jcityvalue = $_POST['jcity'];
echo "jnumvalue:".$jnumvalue."</br>";
echo "jnumvalue:".$jnamevalue."</br>";
echo "jcityvalue:".$jcityvalue."</br>";
}
try{
		
    $connection_string = "mysql:host=localhost;dbname=Sree";
    $db_user = "Sree";
    $db_pwd = "ITE320";
		
    $conn_pdo2 = new PDO($connection_string,$db_user,$db_pwd);
    $conn_pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
    //echo "conencted to database successfully"."</br>";
    // write your sql query
    $sqlqry2="INSERT INTO J(j_num,j_name,city) VALUES(:j_num,:jname,:city)";
		// use connection with PDO prepared statements
        $statement2 = $conn_pdo2->prepare($sqlqry2);
        //echo "after prepare"."</br>";
        $statement2->bindvalue(':j_num', $jnumvalue);
        $statement2->bindvalue(':jname', $jnamevalue);
        $statement2->bindvalue(':city',$jcityvalue);
         //echo "after bind"."</br>";
           // execute
	$count= $statement2->execute();
         // echo "after exec"."</br>";
        echo "<br><hr>";	
     echo "New Records:  ".$count." Successfully inserted into J table";  
      echo "<br><hr>";
     echo "<a href=\"http://weblab.salemstate.edu/~Sree/get-data-from-j.php\">Click here to see the inserted values </a>";
      echo "<br><hr>";
      echo "<a href=\"http://weblab.salemstate.edu/~Sree/home-page-for-sample-db.php\">Back to Home </a>";
 // close database connection
	$conn_pdo2=null;
    }

catch (PDOException $e){
    die($e->getMessage());
}
?>