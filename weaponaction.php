
<?php
session_start();
     
include('connection.php');

$weaponcategory=$_POST['weaponcategory'];


$check_category = mysqli_query($db, "SELECT * FROM weapon WHERE weaponcategory = '$weaponcategory' ");
if(mysqli_num_rows($check_category) > 0){
      header('Location:weapons.php?error=1'); 
}
else{
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
   mysqli_query($db, "INSERT INTO weapon(weaponcategory) VALUES('$weaponcategory' )");
/*}*/
   if($mysqli_query_execute->num_rows ===0){
          header('Location:weapons.php?error=2');
        }
else{ 
          header('Location:weapons.php?error=3');

         }
}

?>