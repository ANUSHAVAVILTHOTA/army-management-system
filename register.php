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

<script type="text/javascript">
$(document).ready(function(){
$('#dob').datepicker({
            /*format: "dd/mm/yyyy",*/
          dateFormat: 'dd-M-yy',
        }); 
});
</script> 
</head>
<?php /*include "header1.php";*/ ?>
<?php include "topmenu.php"; ?>
<body>

<div class="container-fluid">
<div class="row">        
<div class="col-xs-12 col-sm-12">

<br><br><br><br><br><br><br>
<center><h3><strong>Registration</strong></h3>
<?php
            if(isset($_GET['error'])==true){
                if($_GET['error']==1){
                    
                echo "<b style='color:red'>*&nbsp; Email id alreary exist please give the another email id. </b>";       

                }
                elseif($_GET['error']==2){
                    
                echo "<b style='color:red'>*&nbsp; Mobile number alreary exist please give the another mobile number. </b>";       

                }
                elseif($_GET['error']==3){
                    
                echo "<b style='color:red'>*&nbsp; Registration details successfully not added . </b>";       

                }
                elseif($_GET['error']==4){
                    
                echo "<b style='color:#ff9900'>*&nbsp; Your registration is successfully done. </b>";       

                }
            }
            ?> </center>
<div class="row">
  <div class="col-xs-12 col-sm-2 form-group"></div>          
            <div class="col-xs-12 col-sm-10 form-group">
           
<br><br>
<div class="log">
<form method="POST" action="registeraction.php" enctype="multipart/form-data" >

<div class="row">
       <div class="col-xs-12 col-sm-5 form-group">
        <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-user"></i></span>
      <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required>
        </div>
      </div>
   <div class="col-xs-12 col-sm-5 form-group">
       <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-user"></i></span>
          <select class="form-control" id="gender" name="gender" required>
                <option value="">Please Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
          </select>
       </div>
   </div>
</div>
    <div class="row">
       <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-envelope"></i></span>
      <input type="email" class="form-control" id="emailid" placeholder="Email Id" name="emailid" required>
      </div>
    </div> 
    <div class="col-xs-12 col-sm-5 form-group">
        <div class="input-group">
          <span class="input-group-addon"><i class ="fa fa-lock"></i></span>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
    </div>                               
  </div> 
   
  <div class="row">
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-phone"></i></span>
      <input type="text" class="form-control" id="mobile" placeholder="Contact Number" name="mobile" required maxlength="10" title="The contact number must enter 10 digits number"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
      </div>
    </div>
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
        <span class="input-group-addon"><i class ="fa fa-image"></i></span>
          <input type="file" name="file" class="form-control" placeholder="Image" required>
      </div>
    </div>                       
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-calendar"></i></span>
      <input type="date" class="form-control " data-date-format="" id="dobb" placeholder="Date of Birth" name="dob" required>
      </div>
    </div> 
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
<input type="text" class="form-control" id="address" placeholder="Address" name="address" required>    
      </div>
    </div>
  </div>
  <div class="row">
       <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
      <input type="text" class="form-control" id="city" placeholder="Town / City" name="city" required>
    </div>
    </div>       
    <div class="col-xs-12 col-sm-5 form-group">
      <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
          <select class="form-control" id="state" name="state" required>
              <option value="">Please Select State</option>
              <option value="telangana">Telangana</option>
              <option value="andhrapradesh">Andhra Pradesh</option>
          </select>
          </div>
         </div> 
       </div> 

<div class="row">
  <div class="col-xs-12 col-sm-5 form-group">
     <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>        
              <select class="form-control" id="country" name="country" required>
                <option value="">Please Select Country</option>
                <option value="india">India</option>/
                <option value="australia">Australia</option>
              </select>
              </div>
            </div>
 <div class="col-xs-12 col-sm-5 form-group">
    <div class="input-group">
      <span class="input-group-addon"><i class ="fa fa-address-book"></i></span>
  <input type="text" class="form-control" id="postal" placeholder="Postal Code" name="postal" required 
  maxlength="6" title="The postal number must enter 6 digits number"
  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
     </div>
    </div>
</div>
<!-- <div class="row">       
  <div class="col-xs-12 col-sm-4 form-group">
    <div class="input-group">              
<strong>User type: &nbsp; &nbsp; </strong><label class="radio-inline"><input type="radio" id="manager" value="manager" name="role" required>Manager</label> 
 <label class="radio-inline"><input type="radio" id="user" value="user" name="role" required> User </label>
     </div>
  </div>  
</div> -->
<br>        
<div class="row btngrp">
  <div class="col-xs-12 col-sm-2">
  <a href="login.php"><button type="button" name="submit" class="btn btn-warning btn-md pull-left">Already you have an account</button></a>   
  </div>
  <div class="col-xs-12 col-sm-8">
      <button type="submit" class="btn btn-success btn-md pull-right" id="submitbtn"><span>Submit</span></button>
  </div>
</div>                


</form>  
</div>
               
</div>
</div>

</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
    







