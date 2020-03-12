<?php
session_start();
     
include('connection.php');

$weaponid=$_POST['weaponid'];
$weapontype=$_POST['weapontype'];
$weapontypedesc=$_POST['weapontypedesc'];


$check_type = mysqli_query($db, "SELECT * FROM weapontype WHERE weaponid = '$weaponid' AND weapontype = '$weapontype' ");
if(mysqli_num_rows($check_type) > 0){
      header('Location:weapons.php?error=4'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO weapontype(weaponid, weapontype, weapontypedesc) VALUES('$weaponid', '$weapontype', '$weapontypedesc' )");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:weapons.php?error=5');
        }
else{ 
          header('Location:weapons.php?error=6');

         }
}

?>