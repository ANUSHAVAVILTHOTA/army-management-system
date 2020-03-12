<?php
session_start();
     
include('connection.php');

$teamid=$_POST['teamid'];
$agentmailid=$_POST['agentmailid'];

$check_team = mysqli_query($db, "SELECT * FROM teamassign WHERE teamid = '$teamid' AND agentmailid = '$agentmailid' ");
if(mysqli_num_rows($check_team) > 0){
      header('Location:team.php?error=4'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO teamassign(teamid, agentmailid) VALUES('$teamid', '$agentmailid' )");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:team.php?error=5');
        }
else{ 
          header('Location:team.php?error=6');

         }
}

?>