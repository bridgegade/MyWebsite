<?php
session_start();
require_once 'classes/Membership.php';
$Membership = new Membership();

if($_POST ){
  $response = $Membership->add_User($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['username'],$_POST['pwd']);
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
          <li><a href="#">Sign Up</a></li>
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
<div id="signup">
	<form method="post" action="">
    <?php if(isset($_SESSION['un'])) { echo '  <ul class="center-block">
      <h1><small>You must log out first.</small></h1>';
    }
    else{ echo' <ul class="center-block">
      <h1>Sign Up <small>enter a username and password</small></h1>
        <p>
         <p>
          <label for="email">Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
            <input type="text" name="email" />
        </p>
        <p>
          <label for="firstname">First name &nbsp</label>
            <input type="text" name="firstname" />
        </p>
        
        <p>
          <label for="lastname">Last name &nbsp</label>
            <input type="text" name="lastname" />
        </p>
       
        <p>
          <label for="username">Username &nbsp</label>
            <input type="text" name="username" />
        </p>
        
        <p>
          <label for="pwd">Password &nbsp</label>
            <input type="password" name="pwd" />
        </p>
        </p>
        <botton>
          <input type="submit" id="submit" value="Sign Up" name="submit" />
        </botton>
        </ul>';}
     ?>
    </form>
</div>
</div>
    <?php if(isset($response)) echo "<h4 class='alert'>" . $response." " . "</h4>"; ?>
</div><!--end login-->
</body>
</html>