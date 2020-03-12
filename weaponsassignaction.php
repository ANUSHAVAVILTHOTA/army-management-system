<?php
session_start();
     
include('connection.php');

$teamid=$_POST['teamid'];
$chiefmailid=$_POST['chiefmailid'];
$weaponid=$_POST['weaponid'];
$weapontypeid=$_POST['weapontypeid'];
$weaponitems=$_POST['weaponitems'];
$agentmailid=$_POST['agentmailid'];
$giveweaponitems=$_POST['giveweaponitems'];

date_default_timezone_set("Asia/Kolkata");
$weapongivendate= date("Y-m-d") . ' ' . date("H:i:s");


/*$sql3=mysqli_query($db,"SELECT DISTINCT SUM(a.weaponitems) FROM team t, weapon w, weaponassign a, weapontype e WHERE t.id=a.teamid AND e.id=a.weapontypeid AND w.id=a.weaponid AND t.id=a.teamid AND t.teamlead='$chiefmailid' AND a.weaponid='$weaponid' AND a.weapontypeid='$weapontypeid' ");
while ($row3=mysqli_fetch_array($sql3)) {
$avlitems=$row3[0];
}*/
$avlitems = $weaponitems-$giveweaponitems;

$sql3=mysqli_query($db,"SELECT * FROM assignweapondetails WHERE agentmailid='$agentmailid' AND teamid='$teamid' AND weaponid='$weaponid' AND weapontypeid='$weapontypeid' ");
while ($row3=mysqli_fetch_array($sql3)) {
$avlitemsdtls=$row3['weaponitemdetails'];
}


$itemsavl = $avlitemsdtls+$giveweaponitems;



if($giveweaponitems<=$weaponitems)
{



mysqli_query($db, "INSERT INTO assignweapons(teamid, chiefmailid, agentmailid, weaponid, weapontypeid, weaponitems, weaponassigndate) VALUES('$teamid', '$chiefmailid', '$agentmailid', '$weaponid', '$weapontypeid', '$giveweaponitems', '$weapongivendate' )");
mysqli_query($db,"UPDATE weapondetails SET avlweaponsitems='$avlitems'  WHERE teamid='$teamid' AND weaponid = '$weaponid' AND weapontypeid='$weapontypeid' ");




$check_weapon = mysqli_query($db, "SELECT * FROM assignweapondetails WHERE agentmailid='$agentmailid' AND teamid='$teamid' AND weaponid='$weaponid' AND weapontypeid='$weapontypeid' ");
if(mysqli_num_rows($check_weapon) > 0){

/*mysqli_query($db,"UPDATE weapondetails SET avlweaponsitems='$avlitems'  WHERE teamid='$teamid' AND weaponid = '$weaponid' AND weapontypeid='$weapontypeid' ");*/

mysqli_query($db,"UPDATE assignweapondetails SET weaponitemdetails='$itemsavl'  WHERE agentmailid='$agentmailid' AND teamid='$teamid' AND weaponid = '$weaponid' AND weapontypeid='$weapontypeid' ");

      header('Location:weaponsassign.php?error=1'); 
}
else{

    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
 
/* mysqli_query($db,"UPDATE weapondetails SET weaponsitems='$teamid'  WHERE teamid='$teamid' AND weaponid = '$weaponid' AND weapontypeid='$weapontypeid' ");*/
mysqli_query($db, "INSERT INTO assignweapondetails(agentmailid, teamid,  weaponid, weapontypeid, weaponitemdetails) VALUES('$agentmailid', '$teamid', '$weaponid', '$weapontypeid', '$itemsavl')");




/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:weaponsassign.php?error=2');
        }
else{ 
          header('Location:weaponsassign.php?error=3');

        }
}




}
else
{
	  header('Location:weaponsassign.php?error=3');
}



?>