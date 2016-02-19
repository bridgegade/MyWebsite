<?php
session_start();
?>

<html>
<head>
<title>TheGallery</title>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">  
<link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
<link href = "css/main.css" rel = "stylesheet">
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
<div id = "main">
<h1><small>Under Construction.</small></h1>
</div>



</body>
</html>