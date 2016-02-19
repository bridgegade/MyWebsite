<?php
session_start();
require_once 'classes/Membership.php';
$Membership = new Membership();

// If user clicks Log Out after being logged in.
if(isset($_GET['un']) && $_GET['un'] == '') {
  $Membership->log_User_Out();
}

// When submit is clicked.
if($_POST) {
  $response =  $Membership->send_password_to_email($_POST['email']);
}

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TheGallery</title>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">  
<link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
<link rel="stylesheet" href="css/main.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
   <div class="nav">
      <div class="container">
        <ul class="pull-left">
          <li><a href="About.php">About</a></li>
          <li><a href="Profile.php">Profile</a></li>
          <li><a href="Browse.php">Browse</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="SignUp.php">Sign Up</a></li>
          <?php if(isset($_SESSION['un'])) {
          echo '<li><a href="Login.php?un=">Log Out</a></li>';
          }
           else if(!isset($_SESSION['un'])) { 
          
          echo  '<li><a href="Login.php">Log In</a></li>';
          }
      ?>
          <li><a href="Help.php">Help</a></li>
        </ul>
      </div>
    </div>
<div class="jumbotron">
<div class="container">
<div id="login">
  <form method="post" action="">
      <ul class="center-block">
      <h1><small>Recover your password</small></h1>
        <p>
        <p>
          <label for="name">Email &nbsp</label>
            <input type="text" name="email" />
        </p>
        
        </p>
        <botton>
          <input type="submit" id="submit" value="Send password to email" name="submit" />
        </botton>
        </ul>
    </form>
    
</div>
</div>
    <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
</div><!--end login-->
</body>
</html>