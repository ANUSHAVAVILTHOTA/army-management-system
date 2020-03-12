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

<script type="text/javascript">
$(document).ready(function(){
$('#electiondate').datepicker({
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
               $("#viewweapontype").hide();
      });
    $("#view").click(function(){
               $("#addweapon").hide();
               $("#viewweapon").show();
               $("#viewweapontype").hide();
      });
    $("#views").click(function(){
               $("#addweapon").hide();
               $("#viewweapon").hide();
               $("#viewweapontype").show();
      });
});
</script>
<style type="text/css">
body{
background-image: url('Images/b48.jpg');
}
   
</style>
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
<label class="radio-inline"><input type="radio" id="views" name="optradio"><strong class="text-warning">View Weapons Types</strong></label>
   </center> 
      </div>
    </div>
 <div id="addweapon">
<center><h3><strong>Weapons</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Weapon category alreary exist. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Weapon category is not successfully added . </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#ff9900'>*&nbsp; Weapon category is successfully done. </b>";       
                }
                elseif($_GET['error']==4){  
                echo "<b style='color:red'>*&nbsp; Weapon type already exist. </b>";       
                }
                elseif($_GET['error']==5){
                echo "<b style='color:red'>*&nbsp; Weapon type is not successfully added . </b>";
                }
                elseif($_GET['error']==6){  
                echo "<b style='color:#ff9900'>*&nbsp; Weapon type is successfully done. </b>";       
                }

            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-3"></div>
  <div class="col-xs-12 col-sm-9">
<br><br>         
<form method="POST" action="weaponaction.php" enctype="multipart/form-data" >

<div class="row">
      <div class="col-xs-12 col-sm-8 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
      <input type="text" class="form-control"  id="weaponcategory" placeholder="Weapon Category" name="weaponcategory" required>
      </div>
    </div>
</div>      
<div class="row btngrp">
  <div class="col-xs-12 col-sm-8">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>

<div class="row">
<center><h3><strong>Weapons Type</strong></h3>
  <div class="col-xs-12 col-sm-3"></div>
  <div class="col-xs-12 col-sm-9">
<br><br>         
<form method="POST" action="weapontypeaction.php" enctype="multipart/form-data" >

<div class="row">
<?php     
$sql=mysqli_query($db,"SELECT * FROM weapon ")
?>
  <div class="col-xs-12 col-sm-8 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-building"></i></span>
   <select class="form-control" id="weaponid" name="weaponid" required>
  <option value="">Please Select Weapon</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['id'];?>><?php echo $row['weaponcategory']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-8 form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
      <input type="text" class="form-control"  id="weapontype" placeholder="Weapon Type (Ex: AK-47, 9mm Bullets)" name="weapontype" required>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-8 form-group">
    <textarea class="form-control" rows="3" id="weapontypedesc" name="weapontypedesc" placeholder="Describe about the weapon type details in 4000 words." required></textarea> 
  </div> 
</div>      
<div class="row btngrp">
  <div class="col-xs-12 col-sm-8">
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
                <div class="panel-heading"><center><h3 class="panel-title">Weapon Categoty Details</h3></center>
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
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM weapon ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){


                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['weaponcategory'] . "</td>";

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

 <div id="viewweapontype" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Weapon Type Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Weapon Category" disabled></th>
          <th><input type="text" class="form-control" placeholder="Weapon Type" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT t.id, w.weaponcategory, t.weapontype, t.weapontypedesc FROM weapon w, weapontype t WHERE w.id=t.weaponid ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['weaponcategory'] . "</td>";
                    echo "<td>" . $row['weapontype'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>
<?php
                 echo "<td style='display:none'>" . $row['weapontypedesc'] . "</td>";

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

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Weapon Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Weapon Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="wc" name="wname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Weapon Type:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="wt" name="weapontype" value=""></span></div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Weapon Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="wdesc" name="weapondesc" value=""></span></div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">
                    <i class="fa fa-close"></i>  Close
                </button>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
<br><br>
<?php include "footer.php"; ?>
</body>
</html>

<script type="text/javascript">

$('.viewmodal').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#wc').text($(this).closest("tr").find('td:eq(1)').text());
    $('#wt').text($(this).closest("tr").find('td:eq(2)').text());
    $('#wdesc').text($(this).closest("tr").find('td:eq(4)').text());

    $('#myModal').modal('show');

});
</script>