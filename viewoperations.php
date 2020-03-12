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

    $sql = "SELECT o.id, o.operationname, o.operationpurpose, t.teamname, o.startdate, o.status, o.operationassigndate, o.operationdesc, s.statename, c.countryname  FROM team t, operation o, state s, country c WHERE t.id=o.teamid AND o.stateid=s.id AND c.id=o.countryid AND t.teamlead='$email' ";

/*=SELECT u.id, o.operationname, o.operationpurpose, t.teamname, o.startdate, o.status, o.operationassigndate, o.operationdesc, s.statename, c.countryname, u.updatedate, u.updatemail, u.operationupdatedesc  FROM team t, operation o, state s, country c, operationupdates u WHERE t.id=o.teamid AND o.id=u.operationid AND o.stateid=s.id AND c.id=o.countryid AND t.teamlead='$email'*/

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
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">view</button>
   <a href="editoperation.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-sm">update</a>
   <a href="viewoperations1.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">show</a>
</td>
<?php
                 echo "<td style='display:none'>" . $row['statename'] . " - in - " . $row['countryname'] . "</td>";
                 echo "<td style='display:none'>" . $row['operationassigndate'] . "</td>";
                 echo "<td style='display:none'>" . $row['operationdesc'] . "</td>";

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
                        <div class="col-xs-4 text-info"><strong>Operation Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="on" name="oname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Operation Purpose:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="op" name="opurpose" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Team Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tn" name="teamname" value=""></span></div>
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