<?php
$teamid=$_REQUEST['teamid'];
$weaponid=$_REQUEST['weaponid'];
$weapontypeid=$_REQUEST['weapontypeid'];
//echo"$country";
include "connection.php";
$data=mysqli_query($db,"SELECT weaponsitems FROM weapondetails WHERE teamid='$teamid' AND weaponid='$weaponid' AND weapontypeid='$weapontypeid' ");
/*echo "<option>Please Select Assigned Weapons</option>";*/
while($rec=mysqli_fetch_row($data))
{
echo "<option value='$rec[0]'>$rec[0]</option>";
}
?>

