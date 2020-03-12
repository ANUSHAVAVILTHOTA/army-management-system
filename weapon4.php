<?php
$teamid=$_REQUEST['teamid'];
$weaponid=$_REQUEST['weaponid'];
$weapontypeid=$_REQUEST['weapontypeid'];
//echo"$country";
include "connection.php";
$data=mysqli_query($db,"SELECT avlweaponsitems FROM weapondetails WHERE teamid='$teamid' AND weaponid='$weaponid' AND weapontypeid='$weapontypeid' ");
/*echo "<option>Please Select Assigned Weapons</option>";*/
while($rec=mysqli_fetch_row($data))
{
echo "<option value='$rec[0]'>$rec[0]</option>";
}
?>



<!-- SELECT DISTINCT SUM(a.weaponitems) FROM team t, weapon w, weaponassign a, weapontype e WHERE t.id=a.teamid AND e.id=a.weapontypeid AND w.id=a.weaponid AND t.id=a.teamid AND t.teamlead='$chiefmailid' AND a.weaponid='$weaponid' AND a.weapontypeid='$weapontypeid' -->
