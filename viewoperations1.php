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
background-image: url('Images/bg5.jpg');
}
</style>
</head>
<?php /*include "header.php";*/ ?>
<?php include "chiefmenu.php"; ?>
<?php include "connection.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">


<br><br><br><br><br><br><br><br>

 <div id="viewoperation">
<?php
$id=$_GET['id'];

$sql1=mysqli_query($db,"SELECT * FROM operation WHERE id='$id' ");
while ($row1=mysqli_fetch_array($sql1)) {
$oname=$row1['operationname'];
$opurpose=$row1['operationpurpose'];
}
?>
<center>
<h3><strong>Project Name:</strong><strong style="color:red"> <?php echo $oname; ?></strong><br>
    <strong>Purpose:</strong><strong style="color:red"> <?php echo $opurpose; ?></strong>
</h3>
</center>

<div id="row">
 <a href="viewoperations.php" class="btn btn-danger btn-sm"><i class="fa fa-angle-double-left"></i> Back</a>       
        <div class="table-responsive">

        <div class="panel panel-primary filterable">
                <div class="panel-heading"><center><h3 class="panel-title">Operation Update Details</h3></center>
                 <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><strong><span class="glyphicon glyphicon-filter"></span> Filter</strong></button>
                </div>
                </div>
                <div class="panel-body filtertable">
               
          <table class="table table-striped table-bordered">
          
          <thead>
          <tr class="filters">
          <th>Id</th>
          <th><input type="text" class="form-control" placeholder="Person Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Start Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="Current Status" disabled></th>
          <th><input type="text" class="form-control" placeholder="Update Status" disabled></th>
          <th><input type="text" class="form-control" placeholder="Update Date" disabled></th>
          <th><input type="text" class="form-control" placeholder="Role" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          
          </tr>
          </thead>
          
          <tbody>
          <?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT u.id, o.startdate, o.status, u.status, u.updatedate, u.updatemail, u.operationupdatedesc, r.fullname, r.role, o.operationdesc, u.operationupdatedesc FROM operation o, operationupdates u, register r WHERE o.id=u.operationid AND u.updatemail=r.emailid AND u.operationid='$id' ORDER BY u.id DESC ";

/*SELECT u.id, o.operationname, o.operationpurpose, t.teamname, o.startdate, o.status, o.operationassigndate, o.operationdesc, s.statename, c.countryname, u.updatedate, u.updatemail, u.operationupdatedesc  FROM team t, operation o, state s, country c, operationupdates u WHERE t.id=o.teamid AND o.id=u.operationid AND o.stateid=s.id AND c.id=o.countryid AND t.teamlead='$email'*/

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['startdate'] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    echo "<td>" . $row[3] . "</td>";
                    echo "<td>" . $row['updatedate'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>
<?php
                 echo "<td style='display:none'>" . $row['operationdesc'] . "</td>";
                 echo "<td style='display:none'>" . $row['operationupdatedesc'] . "</td>";

                echo "</tr>";
            }
          
            mysqli_free_result($result);
        } else{
            echo "<center><strong style='color:red'>Records not available.</strong></center>";
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
                        <div class="col-xs-4 text-info"><strong>Person Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="name" name="fullname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Project Start Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="sd" name="startdate" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Current Status:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="cs" name="currentstatus" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Update Status:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="us" name="updatestatus" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Project Update Date:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ud" name="updatedate" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Update Person Role:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="rl" name="role" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Descriprion:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="pdesc" name="projectdesc" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Project Update Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="pddesc" name="pddesc" value=""></span></div>
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
    $('#name').text($(this).closest("tr").find('td:eq(1)').text());
    $('#sd').text($(this).closest("tr").find('td:eq(2)').text());
    $('#cs').text($(this).closest("tr").find('td:eq(3)').text());
    $('#us').text($(this).closest("tr").find('td:eq(4)').text());
    $('#ud').text($(this).closest("tr").find('td:eq(5)').text());
    $('#rl').text($(this).closest("tr").find('td:eq(6)').text());
    $('#pdesc').text($(this).closest("tr").find('td:eq(8)').text());
    $('#pddesc').text($(this).closest("tr").find('td:eq(9)').text());

    $('#myModal').modal('show');

});
</script>