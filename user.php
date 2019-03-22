<?php
       include('database.php');

        // Create connection
        $conn = mysql_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
          mysql_select_db($dbname) or die(mysql_error());
          session_start();
        }
        
        if(!isset($_GET['id'])){
        header('location:company');
        }

 ?><!DOCTYPE html>
<html>

  <head>

	<title>iJobs</title>

	<!--  CSS -->
	<link rel="stylesheet" type="text/css" href="css/user.css">

	<!-- jQuery -->
	<script src="assets/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/index.js"></script>

  </head>

  <body>


    <!-- The Navbar -->
    <div id="navbar">
      
      <div class="container">
        <table>
          <tr><td><img src="assets/img/home.png" width="40"></td></tr>
        </table>

        <div class="logout" onclick="location.href='company?logout=1'" style="cursor: pointer;">Logout</div>
      </div>


    </div>
<?php
  
  $id = $_GET['id'];
  
  $query = mysql_query("SELECT * FROM users WHERE sno = '$id'") or die(mysql_error());
  if(mysql_num_rows($query) >0){
    while($row = mysql_fetch_array($query)){ ?>



    <!-- Main Feed -->
    <div class="feed">
      
      <h1>FirstName's Profile</h1>      
      <table>
          
          <tr><td colspan="2">
          <tr><td>Name  :</td><td><?php echo $row['name']; ?></td></tr>
          <tr><td>Email Id  :</td><td><?php echo $row['email']; ?></td></tr>
          <tr><td>Location  :</td><td><?php echo $row['location']; ?></td></tr>
          <tr><td>Phone   :</td><td><?php echo $row['phone']; ?></td></tr>
          <tr><td>Age   :</td><td><?php echo $row['age']; ?></td></tr>
          <tr><td>Gender  :</td><td><?php echo $row['gender']; ?></td></tr>
          <tr><td>Interests   :</td><td><?php echo $row['interests']; ?></td></tr>
          <tr><td>About me  :</td><td><?php echo $row['me']; ?></td></tr>
              <tr><td>Designation:</td><td><?php echo $row['designation']; ?></td></tr>
          <tr><td>Experience:</td><td><?php echo $row['experience']." Years"; ?></td></tr>
          <tr><td>Prev Organisation(s):</td><td><?php echo $row['prev']; ?></td></tr>
           <tr><td>Masters:</td><td><?php echo $row['masters'].", ".$row['m_year']; ?></td></tr>
           <tr><td>Bachelors:</td><td><?php echo $row['bachelors'].", ".$row['b_year']; ?></td></tr>
          <tr><td>Intermediate:</td><td><?php echo $row['inter'].", ".$row['i_year']; ?></td></tr>
          <tr><td>Schooling:</td><td><?php echo $row['school'].", ".$row['s_year']; ?></td></tr>
          <tr><td>Skills:</td><td><?php echo $row['skills']; ?></td></tr>
          <tr><td>Achievements:</td><td><?php echo $row['achievements']; ?></td></tr>

          

        </table>



      
    </div>

  




  <?php
    }
  }

?>


    <!-- Suggested Companies -->
    <div class="suggested">

      <h1>Photo</h1>
      <img src="assets/img/profile.jpg" width="270">

  <!--<div class="search-results"><button>Select Candidate</button></div> -->

    </div>




  </body>

</html>