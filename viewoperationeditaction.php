<?php
session_start();

include "connection.php";

$id=$_POST['operationid'];
$startdate=$_POST['startdate'];
/*$teamid=$_POST['teamid'];*/
$status=$_POST['status'];
$updatemail=$_POST['updatemail'];
$operationupdatedesc=$_POST['operationupdatedesc'];


date_default_timezone_set("Asia/Kolkata");
$updatedate= date("Y-m-d") . ' ' . date("H:i:s");

$sql1=mysqli_query($db,"SELECT * FROM operation WHERE id='$id' ");
while ($row1=mysqli_fetch_array($sql1)) {
$teamid=$row1['teamid'];
}


// Check connection

    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
$sql = "UPDATE operation SET status='$status'  WHERE id='$id' ";
 
 mysqli_query($db,"INSERT INTO operationupdates (operationid, startdate, teamid,  status, updatedate, updatemail, operationupdatedesc) VALUES ('$id', '$startdate', '$teamid', '$status', '$updatedate', '$updatemail', '$operationupdatedesc')");

/*}*/

if($db->query($sql) === TRUE){
           header('Location:editoperation.php?error=1 & id='.$id);
        }
else{ 
            header('Location:editoperation.php?error=2 & id='.$id);
         }

$db->close();


?> 



