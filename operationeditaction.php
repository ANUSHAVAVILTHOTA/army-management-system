<?php
session_start();

include "connection.php";

$id=$_POST['operationid'];
$startdate=$_POST['startdate'];
$teamid=$_POST['teamid'];
$status=$_POST['status'];
$updatemail=$_POST['updatemail'];


date_default_timezone_set("Asia/Kolkata");
$updatedate= date("Y-m-d") . ' ' . date("H:i:s");

/*$sql1=mysqli_query($db,"SELECT n.id, s.id, s.countryid, n.linename,n.linesenddate, n.linedesc, n.status, n.somailid, n.linereplydate, n.linereplydesc, r.workplace FROM newlines n, register r, state s WHERE n.somailid=r.emailid AND r.workplace=s.statename AND n.id='$id' ");
while ($row1=mysqli_fetch_array($sql1)) {
$linename=$row1['linename'];
$linedesc=$row1['linedesc'];
$stateid=$row1[1];
$countryid=$row1[2];
}
*/
/*date_default_timezone_set("Asia/Kolkata");
$linereplydate= date("Y-m-d") . ' ' . date("H:i:s");*/

// Check connection

    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
$sql = "UPDATE operation SET startdate='$startdate', teamid='$teamid', status='$status'  WHERE id='$id' ";
 
 mysqli_query($db,"INSERT INTO operationupdates (operationid, startdate, teamid,  status, updatedate, updatemail)
  VALUES ('$id', '$startdate', '$teamid', '$status', '$updatedate', '$updatemail')");

/*}*/

if($db->query($sql) === TRUE){
           header('Location:operationedit.php?error=1 & id='.$id);
        }
else{ 
            header('Location:operationedit.php?error=2 & id='.$id);
         }

$db->close();


?> 



