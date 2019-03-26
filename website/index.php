<?php

  session_start(); 
 if(isset($_SESSION['name'])){
          header('location:company'); 
        }
        
  if(isset($_SESSION['email'])){
    header('location:feed'); 
  }
?>
<!DOCTYPE html>
<html>

  <head>

	<title>iJobs</title>

	<!--  CSS -->
	<link rel="stylesheet" type="text/css" href="css/index.css">

	<!-- jQuery -->
	<script src="assets/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/index.js"></script>

  </head>

  <body>

<!-- The left part -->
  	<div class="left">
  	  <div class="container">
	  	 	
  	  	<div class="top-line">One place for</div>
  	  	<div class="bottom-line">JOBS</div>

  	 </div>
  	</div>

	
<!-- The right part -->
  	<div class="right">
  		
  	  <img src="assets/img/logo.png" width="150" class="logo">	
  	  
  	  <div class="container">
  	  		
  	  	<!-- Login Part -->
  	  	<div class="login-div">
  	  	  <form method="POST" action="reg.php" id="form">
  	  	  	<bdi class="better-future">A better future awaits.</bdi>
  	  	  	<bdi class="join">Join iJobs today.</bdi>
  	  	  	<input type="text" name="email" placeholder="Email">
  	  	  	<input type="password" name="password" placeholder="Password">
  	  	  	<button type="submit" name="login">Login</button>
 	  	  	<button type="submit" name="signup" class="sign-up">Sign Up</button>
  	  	  </form>

  	  	  <?php if(isset($_GET['error'])){ ?>
  	 	    <bdi class="error">&times;&nbsp;Make sure you have filled all the details correctly</bdi>
  	  	  <?php } ?>

  	  	 <div class="change">For hosting a job/course, <span>Click here</span></div>
  	  	</div>


  	  	
  	  	<!-- Company Login Part -->
		    <div class="company-div">
  	  	  <form method="POST" action="org_reg.php">
  	  	  	<bdi class="better-future">Make a better future.</bdi>
  	  	  	<bdi class="join">Join iJobs today.</bdi>
  	  	  	<input type="text" name="o_name" placeholder="Organisation Name">
  	  	  	<input type="password" name="o_password" placeholder="Password">
  	  	  	<button type="submit" name="oindex_submit">Get Started</button>
  	  	  </form>

  	  	 <div class="change">Looking for a job/course, <span>Click here</span></div>
  	  	</div>



  	  </div>

  	</div>




  </body>

</html>