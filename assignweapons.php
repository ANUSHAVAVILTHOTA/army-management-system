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
background-image: url('Images/b48.jpg');
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
<script>
$(document).ready(function(){
    $("#add").click(function(){
               $("#addweapon").show();
               $("#viewweapon").hide();
      });
    $("#view").click(function(){
               $("#addweapon").hide();
               $("#viewweapon").show();
      });
});
</script>
<script type="text/javascript">
function fun1(val)
{
//alert("val")
obj=new XMLHttpRequest();

obj.open("post","weapon1.php?id="+val,true)
obj.send()
      obj.onreadystatechange=fun2
      
      }
      function fun2()
{
if(obj.readyState==4)
{
//alert("obj.responseText")
document.getElementById('weapontypeid').innerHTML=(obj.responseText)
}
}

function fun3(val)
{
//alert("val");
obj=new XMLHttpRequest();
   
 var teamid = document.getElementById("teamid").value;
 var weaponid = document.getElementById("weaponid").value;
var weapontypeid=val;
 console.log("teamid--"+teamid+"- weaponid----"+weaponid+"---weapontypeid--"+weapontypeid);
obj.open("post","weapon2.php?teamid="+teamid+"&weaponid="+weaponid+"&weapontypeid="+weapontypeid,true)
obj.send()

      obj.onreadystatechange=fun4
      
      } 

      function fun4()
{
if(obj.readyState==4)
{
//alert("obj.responseText")
document.getElementById('assignedweapons').innerHTML=(obj.responseText)
}
}
</script>
</head>
<?php /*include "header.php";*/ ?>
<?php include "adminmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<br><br><br><br><br><br><br>
<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-success">Add Weapons</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Weapons</strong></label>
   </center> 
      </div>
    </div>
 <div id="addweapon">
<center><h3><strong>Assign Weapons To Team</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Weapons details successfully added. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Weapons details is not successfully added . </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#ff9900'>*&nbsp; Weapons details is successfully done. </b>";       
                }
            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="assignweaponaction.php" enctype="multipart/form-data" >

<div class="row">
<?php     
$sql=mysqli_query($db,"SELECT * FROM team ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
    <label for="">Team :</label>
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-building"></i></span>
   <select class="form-control" id="teamid" name="teamid" required>
  <option value="">Please Select Team</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['id'];?>><?php echo $row['teamname']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
<?php     
$sql1=mysqli_query($db,"SELECT * FROM weapon ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
    <label for="">Weapon :</label>
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-building"></i></span>
   <select class="form-control" id="weaponid" name="weaponid" onChange="fun1(this.value)" required>
  <option value="">Please Select Weapon</option> 
     <?php while ($row1=mysqli_fetch_array($sql1)) { ?>
  <option value=<?php echo $row1['id'];?>><?php echo $row1['weaponcategory']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-5 form-group">
  <label for="">Weapon Type :</label>
    <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>         
<select class="form-control" id="weapontypeid" name="weapontypeid" onChange="fun3(this.value)" required>
 <option value=""> Please Select Weapon Type </option>   
</select>
    </div>
</div>
<div class="col-xs-12 col-sm-5 form-group">
  <label for="">Assigned Weapons :</label>
    <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>         
<select class="form-control" id="assignedweapons" name="assignedweapons">
 <option value=""> Please Select Assigned Weapons </option>   
</select>
    </div>
</div>
</div>
<div class="row">
 <div class="col-xs-12 col-sm-5 form-group">
  <label for="">Weapon Items :</label>
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-phone"></i></span>
      <input type="text" class="form-control" id="weaponitems" placeholder="Weapon Items (Numbers Only)" name="weaponitems" required maxlength="3" title="The weapon items must enter 3 digits number"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
      </div>
    </div>
</div> 

<!-- <div class="row">
 <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-phone"></i></span>
      <input type="text" class="form-control" id="weapontypeitems" placeholder="Weapon Type Items (Numbers Only)" name="weapontypeitems" required maxlength="4" title="The weapon items must enter 4 digits number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
      </div>
    </div>
</div>  -->   
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>
</div>
  
<div id="viewweapon" style="display:none">
<div id="row">      
<div class="table-responsive">

   <div class="panel panel-primary filterable">
     <div class="panel-heading"><center><h3 class="panel-title">Weapon Assign to Team Details</h3></center>
       <div class="pull-right">
          <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
       </div>
      </div>
      <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Team" disabled></th>
          <th><input type="text" class="form-control" placeholder="Weapon" disabled></th>
          <th><input type="text" class="form-control" placeholder="Weapon Type" disabled></th>
          <th><input type="text" class="form-control" placeholder="Weapon Items" disabled></th>
          <th><input type="text" class="form-control" placeholder="Assign Date" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT a.id, t.teamname, w.weaponcategory, p.weapontype, a.weaponitems, a.weaponassigndate FROM weaponassign a, weapontype p, weapon w, team t WHERE a.teamid=t.id AND a.weaponid=w.id AND a.weapontypeid=p.id ORDER BY a.weaponassigndate DESC ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['teamname'] . "</td>";
                    echo "<td>" . $row['weaponcategory'] . "</td>";
                    echo "<td>" . $row['weapontype'] . "</td>";
                    echo "<td>" . $row['weaponitems'] . "</td>";
                    echo "<td>" . $row['weaponassigndate'] . "</td>";

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
