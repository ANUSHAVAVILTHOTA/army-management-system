<!DOCTYPE html>
<html>
<head>
<title>Army</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>

<link rel="stylesheet" type="text/css" href="css/style/style1.css"/>
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/admin/main.js"></script>    

<style type="text/css">
body{
background-image: url('Images/b19.jpg');
}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('#startdate').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script> 

</head>
<?php /*include "header.php";*/ ?>
<?php include "chiefmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<br><br><br><br><br><br><br><br>

<div id="viewweapon">
<div id="row">      
<div class="table-responsive">

   <div class="panel panel-primary filterable">
     <div class="panel-heading"><center><h3 class="panel-title">Weapon Details</h3></center>
       <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
       </div>
      </div>
      <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Weapon" disabled></th>
          <th><input type="text" class="form-control" placeholder="Weapon Type" disabled></th>
          <th><input type="text" class="form-control" placeholder="Weapon Items" disabled></th>
          <th><input type="text" class="form-control" placeholder="Available Weapon Items" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT d.id, w.weaponcategory, p.weapontype, d.weaponsitems, d.avlweaponsitems FROM weapondetails d, weapon w, weapontype p, team t WHERE d.teamid=t.id AND d.weaponid=w.id AND d.weapontypeid=p.id AND t.teamlead='$email'";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['weaponcategory'] . "</td>";
                    echo "<td>" . $row['weapontype'] . "</td>";
                    echo "<td>" . $row['weaponsitems'] . "</td>";
                    echo "<td>" . $row['avlweaponsitems'] . "</td>";

                echo "</tr>";
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center>Records not available.</center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    mysqli_close($db);
    ?>
          
          
  </tbody>
  </table>
  </div>
  </div>

</div>
</div>
</div>

</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
