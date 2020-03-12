<?php
$id=$_REQUEST['id'];
$teamid=$_REQUEST['teamid'];
//echo"$country";
include "connection.php";

$data=mysqli_query($db,"SELECT d.weapontypeid, w.weapontype FROM weapontype w, weapondetails d WHERE w.id=d.weapontypeid AND d.teamid='$teamid' AND d.weaponid='$id' ");
echo "<option> Please Select Weapon Type </option> ";
while($rec=mysqli_fetch_row($data))
{
echo "<option value=$rec[0]>$rec[1]</option>";	
}

?>


<!-- $id=$_REQUEST['id'];
$chiefmailid=$_REQUEST['chiefmailid'];
//echo"$country";
include "connection.php";

$data=mysqli_query($db,"SELECT DISTINCT a.weapontypeid, e.weapontype FROM team t, weapon w, weaponassign a, weapontype e WHERE t.id=a.teamid AND e.id=a.weapontypeid AND w.id=a.weaponid AND t.id=a.teamid AND t.teamlead='$chiefmailid' AND a.weaponid='$id' ");
echo "<option> Please Select Weapon Type </option> ";
while($rec=mysqli_fetch_row($data))
{
echo "<option value=$rec[0]>$rec[1]</option>";	
} -->