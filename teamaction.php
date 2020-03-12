<?php
session_start();
     
include('connection.php');

$teamname=$_POST['teamname'];
$teamlead=$_POST['teamlead'];
$teamdesc=$_POST['teamdesc'];


$check_team = mysqli_query($db, "SELECT * FROM team WHERE teamname = '$teamname' AND teamlead = '$teamlead' ");
if(mysqli_num_rows($check_team) > 0){
      header('Location:team.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO team(teamname, teamlead, teamdesc) VALUES('$teamname', '$teamlead', '$teamdesc' )");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:team.php?error=2');
        }
else{ 
          header('Location:team.php?error=3');

         }
}

?>