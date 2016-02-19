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
<p> Hi, my name is Anthony Vo and I'm a programmer who happens to enjoy creating art.

 </p>
</div>


<div class = "pic">
  <img src = "http://orig04.deviantart.net/be5e/f/2015/318/c/f/preseason_3_digi_art_throwdown_version_2_by_bridgegade-d5t3coh.jpg"    />
  <img src = "http://img07.deviantart.net/34b4/i/2015/064/3/5/goku_by_bridgegade-d6u5pfx.jpg"    />
  <img src = "http://orig11.deviantart.net/a184/f/2015/064/4/f/eddie_brock_escaping_venom_by_bridgegade-d7nuvsi.jpg"    />
</div>
</body>
</html>