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
               $("#addoperation").show();
               $("#viewoperation").hide();
      });
    $("#view").click(function(){
               $("#addoperation").hide();
               $("#viewoperation").show();
      });
});
</script>
<script type="text/javascript">
function fun1(val)
{
//alert("val")
obj=new XMLHttpRequest();

obj.open("post","place1.php?id="+val,true)
obj.send()
      obj.onreadystatechange=fun2
      
      }
      function fun2()
{
if(obj.readyState==4)
{
//alert("obj.responseText")
document.getElementById('stateid').innerHTML=(obj.responseText)
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
<label class="radio-inline"><input type="radio" id="add" name="optradio"><strong class="text-success">Add Operation</strong></label>
<label class="radio-inline"><input type="radio" id="view" name="optradio"><strong class="text-danger">View Operations</strong></label>
   </center> 
      </div>
    </div>
 <div id="addoperation">
<center><h3><strong>Operation</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){ 
                echo "<b style='color:red'>*&nbsp; Operation details alreary exist. </b>";       
                }
                elseif($_GET['error']==2){
                echo "<b style='color:red'>*&nbsp; Operation details is not successfully added . </b>";
                }
                elseif($_GET['error']==3){  
                echo "<b style='color:#ff9900'>*&nbsp; Operation details is successfully done. </b>";       
                }
            }
            ?>
</center>            
<div class="row">
  <div class="col-xs-12 col-sm-2"></div>
  <div class="col-xs-12 col-sm-10">
<br><br>         
<form method="POST" action="operationaction.php" enctype="multipart/form-data" >
<input type="hidden" id ="updatemail" name="updatemail" value="<?php echo $email; ?>" readonly>
<div class="row">
  <div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
      <input type="text" class="form-control" id ="operationname" placeholder="Operation Name" name="operationname" required>
    </div>
  </div>
  <div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
      <input type="text" class="form-control" id ="operationpurpose" placeholder="Operation Purpose" name="operationpurpose" required>
    </div>
  </div>
</div>
<div class="row">
<?php     
$sql=mysqli_query($db,"SELECT * FROM team ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
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
<div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
      <input type="text" class="form-control " data-date-format="" id="startdate" placeholder="Start Date" name="startdate" required>
      </div>
    </div>  
</div> 
<div class="row">
<?php     
$sql1=mysqli_query($db,"SELECT * FROM country ")
?>
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
     <span class="input-group-addon"><i class ="fa fa-building"></i></span>
   <select class="form-control" id="countryid" name="countryid" onChange="fun1(this.value)" required>
  <option value="">Please Select Work Country</option> 
     <?php while ($row1=mysqli_fetch_array($sql1)) { ?>
  <option value=<?php echo $row1['id'];?>><?php echo $row1['countryname']; ?></option>
<?php } ?>
   </select>    
    </div>
  </div>
<div class="col-xs-12 col-sm-5 form-group">
 <div class="input-group">
   <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>         
    <select class="form-control" id="stateid" name="stateid" required>
     <option value=""> Please Select State </option>   
    </select>
  </div>
</div>
</div>   
<div class="row">
  <div class="col-xs-12 col-sm-10 form-group">
    <textarea class="form-control" rows="3" id="operationdesc" name="operationdesc" placeholder="Describe about the operation details in 4000 words." required></textarea> 
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
  
 <div id="viewoperation" style="display:none">

  <div id="row">
        
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Operation Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Purpose" disabled></th>
          <th><input type="text" class="form-control" placeholder="Team" disabled></th>
          <th><input type="text" class="form-control" placeholder="Start Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="Status" disabled></th>
          <th><input type="text" class="form-control" placeholder="View & Update" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT o.id, o.operationname, o.operationpurpose, t.teamname, o.startdate, o.status, c.countryname, s.statename, o.operationassigndate, o.operationdesc FROM operation o, team t, country c, state s WHERE o.teamid=t.id AND o.teamid=t.id AND o.countryid=c.id AND o.stateid=s.id ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['operationname'] . "</td>";
                    echo "<td>" . $row['operationpurpose'] . "</td>";
                    echo "<td>" . $row['teamname'] . "</td>";
                    echo "<td>" . $row['startdate'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
   <a href="operationedit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm">Edit</a>
   <a href="viewoperations2.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Show</a>
</td>
<?php
                 echo "<td style='display:none'>" . $row['statename'] . " - in - " . $row['countryname'] . "</td>";
                 echo "<td style='display:none'>" . $row['operationassigndate'] . "</td>";
                 echo "<td style='display:none'>" . $row['operationdesc'] . "</td>";

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
                <h4 class="modal-title">Operation Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Operation Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="on" name="oname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Operation Purpose:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="op" name="opurpose" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Team Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tn" name="teanname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Start Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sd" name="sdate" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Status:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sts" name="status" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>State in Country:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sic" name="sic" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Assign Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ad" name="assigndate" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Operation Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="odesc" name="operationdesc" value=""></span></div>
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
<?php include "footer.php"; ?>
</body>
</html>


<script type="text/javascript">

$('.viewmodal').click(function () {
    $('#id').text($(this).closest("tr").find('td:eq(0)').text());
    $('#on').text($(this).closest("tr").find('td:eq(1)').text());
    $('#op').text($(this).closest("tr").find('td:eq(2)').text());
    $('#tn').text($(this).closest("tr").find('td:eq(3)').text());
    $('#sd').text($(this).closest("tr").find('td:eq(4)').text());
    $('#sts').text($(this).closest("tr").find('td:eq(5)').text());
    $('#sic').text($(this).closest("tr").find('td:eq(7)').text());
    $('#ad').text($(this).closest("tr").find('td:eq(8)').text());
    $('#odesc').text($(this).closest("tr").find('td:eq(9)').text());

    $('#myModal').modal('show');

});
</script>