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

<div id="viewassignteam">

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
          <th><input type="text" class="form-control" placeholder="Team Name" disabled></th>
          <th><input type="text" class="form-control" placeholder="Agent" disabled></th>
          <th><input type="text" class="form-control" placeholder="Mobile" disabled></th>
          <th><input type="text" class="form-control" placeholder="View" disabled></th>
          </tr>
          </thead>
          
          <tbody>
<?php
     include "connection.php";

    if($db === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

    $sql = "SELECT a.id, t.teamname, r.fullname, t.teamdesc, r.mobile, a.agentmailid, r.gender, r.address, r.city, r.state, r.country, r.postal FROM team t, teamassign a, register r WHERE t.id=a.teamid AND a.agentmailid=r.emailid AND t.teamlead='$email' ";

    if($result = mysqli_query($db, $sql)){

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){


                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['teamname'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
?>
<td>
   <button type="button" class="viewmodal btn btn-warning btn-sm" data-toggle="modal">View</button>
</td>
<?php
                echo "<td style='display:none'>" . $row['agentmailid'] . "</td>";
                echo "<td style='display:none'>" . $row['teamdesc'] . "</td>";
                echo "<td style='display:none'>" . $row['gender'] . "</td>";
                echo "<td style='display:none'>" . $row['address' ] . ",&nbsp;" . $row['city' ] . ",<br>" . $row['state' ] .",&nbsp;" . $row['country' ] . ",<br>" . $row['postal' ] .   "</td>";

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
                <h4 class="modal-title">Team Details:</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <span id="demomsg"><br></span>

                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Team Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tn" name="tname" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Agent Name:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="ag" name="agent" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Agent Gender:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="agd" name="agentgender" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Agent Mobile:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="am" name="agentmobile" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Agent Mail  Id:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="amid" name="agentmailid" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Agent Address:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="agaddr" name="agentaddress" value=""></span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-info"><strong>Team Description:</strong></div>
                        <div class="col-xs-8 text-warning"><span id="tdesc" name="tdesc" value=""></span></div>
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
    $('#tn').text($(this).closest("tr").find('td:eq(1)').text());
    $('#ag').text($(this).closest("tr").find('td:eq(2)').text());
    $('#am').text($(this).closest("tr").find('td:eq(3)').text());
    $('#amid').text($(this).closest("tr").find('td:eq(5)').text());
    $('#tdesc').text($(this).closest("tr").find('td:eq(6)').text());
    $('#agd').text($(this).closest("tr").find('td:eq(7)').text());
    $('#agaddr').text($(this).closest("tr").find('td:eq(8)').text());

    $('#myModal').modal('show');

});
</script>