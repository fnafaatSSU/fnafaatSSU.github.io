<?php

// get values from user
if (isset($_POST['cjname']) && ($_POST['njname']))
{
$cjnamev=$_POST["cjname"];
$njnamev=$_POST["njname"];
//echo " crrent value from user:  ".$cjnamev;
//echo " new value to be updated from user:  ".$njnamev;
echo "<br><hr>";
echo "<a href=\"http://weblab.salemstate.edu/~Sree/get-data-from-j.php\">Click here to see the values in J table </a>";
echo "<br><hr>";
}
try{
	
    //echo "inside try blacok";
    $connection_string = "mysql:host=localhost;dbname=Sree";
    $db_user = "Sree";
    $db_pwd = "ITE320";
		
    $conn_pdo2 = new PDO($connection_string,$db_user,$db_pwd);
    $conn_pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
    //echo "conencted to database successfully"."</br>";
    //write your sql query
    // turn off safe uopdate query
    $safeupdate= "SET SQL_SAFE_UPDATES=0;";
    $safestatm = $conn_pdo2->prepare($safeupdate);
    $safestatm->execute();
   // echo "after safe update"."</br>";
    $sqlqry2="update J SET j_name=:newjname WHERE j_name=:cjnum;";
		// use connection with PDO prepared statements    
    //echo "after update querry"."</br>";;
        $statement2 = $conn_pdo2->prepare($sqlqry2);
        //echo "after prepare"."</br>";
        $statement2->bindvalue(':newjname', $njnamev);
        $statement2->bindvalue(':cjnum', $cjnamev);       
        // echo "after bind"."</br>";
           // execute
	$count= $statement2->execute();
         // echo "after exec"."</br>";
        echo "<br><hr>";	
     echo "Existing Recod:  ".$count." Successfully updated in J table";  
      echo "<br><hr>";
     echo "<a href=\"http://weblab.salemstate.edu/~Sree/get-data-from-j.php\">Click here to see the values in J table </a>";
      echo "<br><hr>";
      echo "<a href=\"http://weblab.salemstate.edu/~Sree/home-page-for-sample-db.php\">Back to Home </a>";
 // close database connection
	$conn_pdo2=null;
    }
catch (PDOException $e){
    die($e->getMessage());
}
?>