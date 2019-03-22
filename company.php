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

        if(isset($_GET['logout'])){
          session_destroy();
          header('location:index');
        }

        if(!isset($_SESSION['name'])){
          header('location:company?logout=1'); 
        }
        else{
          $name = $_SESSION['name'];
          $tempQuery = mysql_query("SELECT * FROM company WHERE name = '$name'");
        }
 ?>

 <!DOCTYPE html>
<html>

  <head>

  <title>iJobs</title>

  <!--  CSS -->
  <link rel="stylesheet" type="text/css" href="css/company.css">

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
        <div class="logout" onclick="location.href='?logout=1'">Logout</div>
      </div>
    </div>


    <!-- Main Feed -->
    <div class="feed">
      
      <!-- Introdu -->
      <div class="top">
      <?php if(mysql_num_rows($tempQuery) > 0){
                  while($r = mysql_fetch_array($tempQuery)){
         ?>        
        <img src="assets/img/logo/<?php echo $r['name']; ?>.png" style="background-color: red;">
        <?php $companyName = $r['name']; ?>
        <bdi class="company-name"><?php echo $r['name'].", ".$r['location']."."; ?></bdi>
        <?php }
              }
         ?>

      </div>

    </div>

    <!-- The Search Area -->
    <div class="search-cover">
      
      <?php if(!isset($_GET['skills'])){ ?>
      <h1>New Vacancy search</h1>
      <form method="GET" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="srch">
        <table align="center">
          <tr><td>Post:</td><td><input type="text" name="post" placeholder="Enter the post"></td></tr>
          <tr><td>Skills Required:</td><td><input type="text" name="skills" placeholder="Enter the required skills"></td></tr>
          <tr><td>Number of Posts:</td><td><input type="number" name="no" placeholder="Enter the total number of posts"></td></tr>
          <tr><td>Location:</td><td><input type="text" name="location" placeholder="Enter location of the Job"></td></tr>
          <tr><td>Salary:</td><td><input type="text" name="salary" placeholder="Enter the Salary in LPA" style="width: 160px;">Lakhs per Annum</td></tr>
          <tr><td>Deadline:</td><td><input type="date" name="deadline"></td></tr>
          <tr><td>About:</td><td><textarea name="about" placeholder="Job Description"></textarea></td></tr>
          <tr><td></td><td><button type="submit" name="submit">Search Candidates</button></td></tr>
        </table>
      </div>
      </form>

     <?php } else{ ?>

     <?php 

        //Adding to Database
        if(isset($_GET['submit'])){

          if(trim($_GET['post']) != "" && trim($_GET['skills']) != "" && trim($_GET['no']) != "" && trim($_GET['location']) != "" && trim($_GET['salary']) != "" && trim($_GET['deadline']) != "" && trim($_GET['about']) != ""){

          echo '<script>alert('.$_GET['skills'].');</script>';

          $post = $_GET['post'];
          $skills = $_GET['skills'];
          $no = $_GET['no'];
          $location = $_GET['location'];
          $salary = $_GET['salary'];
          $deadline = $_GET['deadline'];
          $about = $_GET['about'];

          $query = mysql_query("INSERT INTO vacancy(post, skills, no, location, salary, deadline, about) VALUES ('$post', '$skills', '$no', '$location', '$salary', '$deadline', '$about')") or die(mysql_error());

          header('location:company?skills='.$skills.'&location='.$location.'');
          
          }

          else{
          header('location:company');
        }
        
        }

     ?>


     <h1>Search Results</h1>

<?php
        $job_id = mysql_query("SELECT * FROM vacancy ORDER BY sno DESC LIMIT 0, 1") or die(mysql_error());
        if(mysql_num_rows($job_id) > 0){
          while($ji = mysql_fetch_array($job_id)){
            $jobId = $ji['sno'];
          }
        }

 ?>



     <?php

        $skills = $_GET['skills'];
        $location = $_GET['location'];

        $query2 = mysql_query("SELECT * FROM users WHERE skills LIKE '%{$skills}%' AND location LIKE '%{$location}%'") or die(mysql_error());

          $i = 0;

          if(mysql_num_rows($query2) > 0){
              while($row = mysql_fetch_assoc($query2)){ 
                  $i++;

                ?>


          <div class="search-results">
            
            <img src="assets/img/profile.jpg" width="60" style="border-radius: 50px;">
            <bdi class="name" onclick="location.href = 'user?id=<?php echo $row['sno']; ?>'"><?php echo $row['name']; ?></bdi>
            <bdo>Email id: <?php echo $row['email']; ?></bdo>
            <button job_id="<?php echo $jobId; ?>" company_name="<?php echo $companyName ?>" name="<?php echo $row['name']; ?>" id="<?php echo "btn".$i; ?>">Select Candidate</button>


          </div>

        <?php } ?>
     <?php } ?>
     <button id="done">Done</button>
  <?php } ?>
    </div>


  </body>

</html>