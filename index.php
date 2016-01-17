<?php

require_once 'classes/Membership.php';
$membership = New Membership();

$membership->confirm_Member();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
          <li><a href="#">Browse</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="SignUp.php">Sign Up</a></li>
          <li><a href="Login.php?un=">Log Out</a></li>
          <li><a href="#">Help</a></li>
        </ul>
      </div>
    </div>
<div class="jumbotron">
  <h1>
    <small>You have successfully logged in!</snall>
  </h1>
</div>
</body>
</html>
