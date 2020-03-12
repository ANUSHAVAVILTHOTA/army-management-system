<?php
session_start();
     
include('connection.php');

$teamid=$_POST['teamid'];
$weaponid=$_POST['weaponid'];
$weapontypeid=$_POST['weapontypeid'];
$assignedweapons=$_POST['assignedweapons'];
$weaponitems=$_POST['weaponitems'];


date_default_timezone_set("Asia/Kolkata");
$weaponassigndate= date("Y-m-d") . ' ' . date("H:i:s");


/*$sql1=mysqli_query($db,"SELECT DISTINCT SUM(weaponitems) FROM weaponassign WHERE teamid='$teamid' AND weaponid='$weaponid' AND weapontypeid='$weapontypeid' ");
while ($row1=mysqli_fetch_array($sql1)) {
$availableitems=$row1[0];
}
$avlitem = $availableitems+$weaponitems;*/
$avlitems = $weaponitems+$assignedweapons;

mysqli_query($db, "INSERT INTO weaponassign(teamid, weaponid, weapontypeid, weaponitems, weaponassigndate) VALUES('$teamid', '$weaponid', '$weapontypeid', '$weaponitems', '$weaponassigndate' )");


$check_weapon = mysqli_query($db, "SELECT * FROM weapondetails WHERE teamid='$teamid' AND weaponid='$weaponid' AND weapontypeid='$weapontypeid' ");
if(mysqli_num_rows($check_weapon) > 0){

mysqli_query($db,"UPDATE weapondetails SET weaponsitems='$avlitems', avlweaponsitems='$avlitems'  WHERE teamid='$teamid' AND weaponid = '$weaponid' AND weapontypeid='$weapontypeid' ");

      header('Location:assignweapons.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
 
mysqli_query($db, "INSERT INTO weapondetails(teamid, weaponid, weapontypeid, weaponsitems, avlweaponsitems) VALUES('$teamid', '$weaponid', '$weapontypeid', '$avlitems', '$avlitems')");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:assignweapons.php?error=2');
        }
else{ 
          header('Location:assignweapons.php?error=3');

        }

}
?>