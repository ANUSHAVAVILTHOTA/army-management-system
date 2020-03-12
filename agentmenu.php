<?php
session_start();
$role=$_SESSION['role'];
$role;
if($role!='agent')
{
  header('Location: login.php');
}
?>
<!-- Navigation -->
        <nav class="navbar  navbar-fixed-top"style="background-color: #4a0352" >
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

<center><h2><strong style="color:#ffffff"> &nbsp; &nbsp; &nbsp; ARMY MANAGEMENT SYSTEM</strong></h2></center>
<br> <p style="margin-left:10px; color:#ffffff"><strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php date_default_timezone_set("Asia/Kolkata");
echo date("d F, Y") ;  ?></strong></p>

                  <!--   <a class="nav-btn btn-dark btn-lg accordion-toggle pull-left" title="Follow Us" role="tab" id="social-collapse" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></a> -->
                    <a id="menu-toggle" href="#" class="nav-btn btn-dark btn-lg toggle">
                        <i class="fa fa-bars" style="color:#fff;"></i>
                    </a>
                    <a id="to-top" class="btn btn-lg btn-inverse" href="#top">
                        <span class="sr-only">Toggle to Top Navigation</span>
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <a id="menu-close" href="#" class="btn btn-danger pull-right hidden-md hidden-lg toggle"><i class="fa fa-times"></i></a>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li class="sidebar-brand">
                    <a href="#top"> <strong><?php echo $email=$_SESSION['emailid']; ?></strong></a>
                </li>
                <li>
                    <a href="agenthome.php">Home</a>
                </li>
                <li>
                    <a href="viewteamdetails.php">Team</a>
                </li>
                <li>
                    <a href="viewoperationdetails.php">Operation</a>
                </li>
                <li>
                    <a href="viewweapondetails.php">Weapons</a>
                </li>
                <li>
                    <a href="agentmails.php">Mails</a>
                </li>
                <li>
                    <a href="agentprofile.php">Profile</a>
                </li>
                <!-- <li>
                    <a href="login.php" title="Navigate to 'Our Services' section">Login</a>
                </li> -->
                <li>
                    <a href="logout.php">Sign-out</a>
                </li>

            </ul>
        </nav>

       <!--  <aside id="accordion" class="social text-vertical-center">
            <div class="accordion-social">
                <ul class="panel-collapse collapse in nav nav-stacked" role="tabpanel" aria-labelledby="social-collapse" id="collapseOne">
                    <li><a href="https://www.facebook.com/soldierupdesigns" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/soldierupdesign" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
                    <li><a href="https://www.plus.google.com/+soldierupdesigns" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
                    <li><a href="https://github.com/blayderunner123" target="_blank"><i class="fa fa-lg fa-github"></i></a></li>
                    <li><a href="https://linkedin.com/in/blayderunner123" target="_blank"><i class="fa fa-lg fa-linkedin"></i></a></li>
                    <li><a href="skype:live:soldierupdesigns?call"><i class="fa fa-lg fa-skype" target="_blank"></i></a></li>
                    <li><a href="http://stackexchange.com/users/4992378/blayderunner123" target="_blank"><i class="fa fa-lg fa-stack-exchange"></i></a></li>
                </ul>
            </div>
        </aside> -->
        
       

            </div>
        </div>
        
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        <script>
            $(document).ready(function(){
                $("[rel='tooltip']").tooltip();
            });
        </script>

