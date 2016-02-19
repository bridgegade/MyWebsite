<?php
session_start();
require_once 'classes/Membership.php';
$Membership = new Membership();



if($_POST){
  $directory  = getcwd().DIRECTORY_SEPARATOR."userImages".DIRECTORY_SEPARATOR;
  if(!empty($_FILES["fileToUpload"]["name"])){
  $fileDirectory = $directory . basename($_FILES["fileToUpload"]["name"])."";
  $response =  $Membership->attach_Image($fileDirectory);
  }
  else{
  $response = "Please choose a file to upload.";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>TheGallery</title>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">  
<link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
<link href = "css/main.css" rel = "stylesheet">
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
<div id = "main">
<p> 
<?php if(!(isset($_SESSION['un']))) { echo '  <ul class="center-block">
      <h1><small>You must log in first.</small></h1>';
    }
    else{
      echo '<h1><small>Under construction, more features to come.</small></h1><form action= "" method = "post" enctype = "multipart/form-data">
     
      <input type = "file" name = "fileToUpload" id = "fileToUpload" style = "padding-left: 300px;">
      <input type = "submit" name = "submit" value = "Upload Picture" style = "display: block;margin-top:10px;padding-left: 300px;">
      </form>';
    }
    ?>
</p>
  <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
</div>

<div class = "pic">
<?php 
$imgDirectories = $Membership->grab_User_Pictures();
foreach ($imgDirectories as $path) {

  echo ' <img src = "'.$path.'" >';
 }
?>
</div>
</body>
</html>