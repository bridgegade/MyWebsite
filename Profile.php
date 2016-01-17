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


 <div class="nav">
      <div class="container">
        <ul class="pull-left">
          <li><a href="About.php">About</a></li>
          <li><a href="#">Browse</a></li>
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
          
          <li><a href="#">Help</a></li>
        </ul>
      </div>
    </div>
<div id = "main">
<p> 
<?php if(!(isset($_SESSION['un']))) { echo '  <ul class="center-block">
      <h1><small>You must log in first.</small></h1>';
    }
    else{
      echo '<form action= "Upload.php" method = "post" enctype = "multipart/form-data">
      <label for="fileToUpload">Upload Image: &nbsp</label>
      <input type = "file" name = "fileToUpload" id = "fileToUpload">
      <input type = "submit" name = "submit" value = "Upload Image">
      </form>';
    }
    ?>
</p>

</div>
<body>


</body>
</html>