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
               $("#addteam").show();
               $("#viewteam").hide();
               $("#viewassignteam").hide();
      });
    $("#view").click(function(){
               $("#addteam").hide();
               $("#viewteam").show();
               $("#viewassignteam").hide();
      });
    $("#views").click(function(){
               $("#addteam").hide();
               $("#viewteam").hide();
               $("#viewassignteam").show();
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


<br><br><br><br><br><br>
<div class="row">
<div class="col-xs-12 col-sm-12 form-group">
   <center>Please select : &nbsp;&nbsp;&nbsp;
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-success">Add Teams</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Teams</strong></label>
<label class="radio-inline"><input type="radio" id="views" name="optradio"><strong class="text-warning">View Assign Teams</strong></label>
   </center> 
      </div>
    </div>
 <div id="addteam">
<center><h3><strong>Team</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Team alreary exist. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Team is not successfully added . </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#ff9900'>*&nbsp; Team is successfully done. </b>";       
                }
                elseif($_GET['error']==4){  
                echo "<b style='color:red'>*&nbsp; Team assign already exist. </b>";       
                }
                elseif($_GET['error']==5){
                echo "<b style='color:red'>*&nbsp; Team assign is not successfully added . </b>";
                }
                elseif($_GET['error']==6){  
                echo "<b style='color:#ff9900'>*&nbsp; Team assign is successfully done. </b>";       
                }

            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="teamaction.php" enctype="multipart/form-data" >

<div class="row">
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-users"></i></span>
      <input type="text" class="form-control"  id="teamname" placeholder="Team Name" name="teamname" required>
     </div>
  </div>
  <?php     
$sql=mysqli_query($db,"SELECT * FROM register WHERE role='chief' ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-user"></i></span>
   <select class="form-control" id="teamlead" name="teamlead" required>
  <option value="">Please Select Chief Officer</option> 
     <?php while ($row=mysqli_fetch_array($sql)) { ?>
  <option value=<?php echo $row['emailid'];?>><?php echo $row['fullname'] . " - " . $row['emailid']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <textarea class="form-control" rows="2" id="teamdesc" name="teamdesc" placeholder="Describe about the team details in 4000 words." required></textarea> 
  </div> 
</div>      
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>

<div class="row">
<center><h3><strong>Assign Team</strong></h3>
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="teamassignaction.php" enctype="multipart/form-data" >

<div class="row">
<?php     
$sql1=mysqli_query($db,"SELECT * FROM team ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-user"></i></span>
   <select class="form-control" id="teamid" name="teamid" required>
  <option value="">Please Select Team</option> 
     <?php while ($row1=mysqli_fetch_array($sql1)) { ?>
  <option value=<?php echo $row1['id'];?>><?php echo $row1['teamname']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
<?php     
$sql2=mysqli_query($db,"SELECT * FROM register WHERE role='agent' ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-user"></i></span>
   <select class="form-control" id="agentmailid" name="agentmailid" required>
  <option value="">Please Select Agent</option> 
     <?php while ($row2=mysqli_fetch_array($sql2)) { ?>
  <option value=<?php echo $row2['emailid'];?>><?php echo $row2['fullname'] . " - " . $row2['emailid']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
</div>      
<div class="row btngrp">
  <div class="col-xs-12 col-sm-10">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                

</form>  
</div>
</div>

</div>
  
 <div id="viewteam" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Team Details</h3></center>
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
          <th><input type="text" class="form-control" placeholder="Team Lead" disabled></th>
          <th><input type="text" class="form-control" placeholder="Team Description" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM team ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){


                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['teamname'] . "</td>";
                    echo "<td>" . $row['teamlead'] . "</td>";
                    echo "<td>" . $row['teamdesc'] . "</td>";

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

 <div id="viewassignteam" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Assign Team Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Team Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Team Lead" disabled></th>
          <th><input type="text" class="form-control" placeholder="Agent" disabled></th>
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT a.id, t.teamname, r.fullname, s.fullname FROM team t, teamassign a, register r, register s WHERE t.id=a.teamid AND t.teamlead=r.emailid AND a.agentmailid=s.emailid ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){


                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['teamname'] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";


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
<br><br>
<?php include "footer.php"; ?>
</body>
</html>
