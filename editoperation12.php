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
$('#startdate').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script>

<style type="text/css">
body{
background-image: url('Images/bg5.jpg');
}
</style>
</head>
<?php /*include "header.php"*/ ?>
<?php include "agentmenu.php" ?>  
<?php include "connection.php"; ?>           
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12 col-sm-12">

<br><br><br><br><br><br><br><br><br>

<?php
$id=$_GET['id'];
$sql1=mysqli_query($db, "SELECT * FROM operation WHERE id='$id' ");
while ($row1 = mysqli_fetch_array($sql1)){
$operationname = $row1['operationname'];
}

/*select a.junctionname, b.junctionname from junction a, junction b where a.id=b.id and a.id=1*/

?>
<center>
<h4> <strong style="color:red"><?php echo $operationname; ?></strong> Details</h4>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==2){
                    
                echo " <b style='color:red'>*&nbsp; Operation details not updated. </b>";       

                }
                elseif($_GET['error']==1){
                    
                echo " <b style='color:#ff9900'>*&nbsp; Operation details updated successfully. </b>";       

                }
                elseif($_GET['error']==3){
                    
                echo " <b style='color:red'>*&nbsp; Operation details already closed. </b>";       

                }
            }
            ?>
</center>
<br>
<div class="row">
  <div class="col-xs-12 col-sm-2 form-group"></div>           
            <div class="col-xs-12 col-sm-10 form-group">

<?php
    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT o.id, o.operationname, o.operationpurpose, t.teamname, o.teamid, o.startdate, o.operationdesc, o.status FROM operation o, team t WHERE t.id=o.teamid AND o.id='$id' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){
?>

<div class=""> 
<form method="post" action="viewoperationupdateaction.php" enctype="multipart/form-data">

<div class="row">
  <div class="col-xs-12 col-sm-5 form-group">
   <input type="hidden" class="form-control" id="operationid" name="operationid" value='<?php echo $id; ?>' readonly>
   <input type="hidden" class="form-control" id="updatemail" name="updatemail" value='<?php echo $email; ?>' readonly>
  </div>
</div>

<div class="row">
      <div class="col-xs-12 col-sm-5 form-group">
        <label for="">Operation Name :</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-user"></i></span>
      <input type="text" class="form-control" id="operationname" placeholder="Operation Name" name="operationname" value='<?php echo $row['operationname'] ?>' readonly>
          </div>
      </div>
  <div class="col-xs-12 col-sm-5 form-group">
    <label for="">Operation Purpose :</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-user"></i></span>
      <input type="text" class="form-control" id="operationpurpose" placeholder="Operation Purpose" name="operationpurpose" value='<?php echo $row['operationpurpose'] ?>' readonly>
          </div>
      </div> 
</div>
<div class="row">
      <div class="col-xs-12 col-sm-5 form-group">
        <label for="">Start Date :</label>
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-user"></i></span>
      <input type="text" class="form-control" id="startdate" placeholder="Start Date" name="startdate" value='<?php echo $row['startdate'] ?>' readonly>
          </div>
      </div>

  <div class="col-xs-12 col-sm-5 form-group">
    <label for="">Team :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
     <input type="text" class="form-control" id="teamid" placeholder="Team Name" name="teamid" value='<?php echo $row['teamname'] ?>' readonly>
     </div>
   </div> 
</div>
<div class="row"> 
  <div class="col-xs-12 col-sm-5 form-group">
    <label for="">Team :</label>
    <div class="input-group">
    <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
     <input type="text" class="form-control" id="status" placeholder="Status" name="status" value='<?php echo $row['status'] ?>' readonly>
     </div>
   </div> 
</div> 
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <label for="">Update Description :</label>
    <textarea class="form-control" rows="3" id="operationupdatedesc" name="operationupdatedesc" placeholder="Describe about the operation details in 4000 words." required></textarea> 
  </div> 
</div>        
</div>
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
  <button type="submit" class="btn btn-success btn-md pull-right" id="loginbtn"><span>Update</span></button>
  </div>
</div>            
               
</form>
</div>

<?php          
            }
          
            mysqli_free_result($result);
        } else{
            echo "<ceenter>No records available.</center>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    } 
    // Close connection
    mysqli_close($db);

    ?>

  </div>
  </div>
  </div>







</div>
</div> 
</div>

<?php include "footer.php"; ?>

</body>
</html>