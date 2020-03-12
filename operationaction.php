<?php
session_start();
     
include('connection.php');

$operationname=$_POST['operationname'];
$operationpurpose=$_POST['operationpurpose'];
$teamid=$_POST['teamid'];
$startdate=$_POST['startdate'];
$countryid=$_POST['countryid'];
$stateid=$_POST['stateid'];
$operationdesc=$_POST['operationdesc'];
$updatemail=$_POST['updatemail'];

date_default_timezone_set("Asia/Kolkata");
$operationassigndate= date("Y-m-d") . ' ' . date("H:i:s");


$check_operation = mysqli_query($db, "SELECT * FROM operation WHERE operationname = '$operationname' ");
if(mysqli_num_rows($check_operation) > 0){
      header('Location:operation.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO operation(operationname, operationpurpose, teamid, startdate, countryid, stateid, operationdesc, status, operationassigndate) VALUES('$operationname', '$operationpurpose', '$teamid', '$startdate', '$countryid', '$stateid', '$operationdesc', 'Not-Open', '$operationassigndate')");

$sql1=mysqli_query($db,"SELECT max(id) FROM operation ");
while ($row1=mysqli_fetch_array($sql1)) {
$opid=$row1[0];

}

   mysqli_query($db,"INSERT INTO operationupdates (operationid, startdate, teamid, status, updatedate, updatemail)
  VALUES ('$opid', '$startdate', '$teamid', 'Not-Open', '$operationassigndate', '$updatemail')");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:operation.php?error=2');
        }
else{ 
          header('Location:operation.php?error=3');

         }
}

?>