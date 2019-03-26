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

        if(!isset($_SESSION['email'])){
          header('location:index'); 
        }

        $email = $_SESSION['email'];
        $query = mysql_query("SELECT * FROM users WHERE email = '".$email."'") or die(mysql_error());
        if(mysql_num_rows($query) > 0){
          while ($row = mysql_fetch_array($query)) {
 ?>
<!DOCTYPE html>
<html>

  <head>

	<title>iJobs</title>

	<!--  CSS -->
	<link rel="stylesheet" type="text/css" href="css/feed.css">

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

        <div class="logout" onclick="location.href = '?logout=1'">Logout</div>
      </div>


    </div>


    <!-- Main Feed -->
    <div class="feed">
      
      <h1>Hi, <?php echo $row['name']; ?>. Companies that shortlisted you.</h1>      

      <?php $name = $row['name']; ?>

      <!-- Feed starts here -->
      <?php 
            //getting the selected jobs
            $jobQuery = mysql_query("SELECT * FROM sel WHERE name = '".$name."' ORDER BY sno DESC") or die(mysql_error());

            if(mysql_num_rows($jobQuery) > 0){
              while($r = mysql_fetch_array($jobQuery)){

                //Getting the company information
                $companyQuery = mysql_query("SELECT * FROM company WHERE name='".$r['company_name']."'") or die(mysql_error());
                if(mysql_num_rows($companyQuery) > 0){
                  while($tt = mysql_fetch_array($companyQuery)){

                    //getting the job information
                    $detailsQuery = mysql_query("SELECT * FROM vacancy WHERE sno = '".$r['job_id']."'") or die(mysql_error());

                      if(mysql_num_rows($detailsQuery) > 0){
                        while($d = mysql_fetch_array($detailsQuery)){

       ?>

        <div class="feed-inside">

          <table cellspacing="0" cellspacing="0">
            <tr>
              <td style="vertical-align: top;"><div class="image"><img src="assets/img/logo/<?php echo $tt['name']; ?>.png" height="50" width="50" style="background-color: red; border-radius: 50px;"></div></td>
          
          <td>
            <bdo class="title">As <?php echo $d['post']; ?></bdo>
            <bdo class="email"><a href="mailto:<?php echo $tt['website']; ?>"><?php echo $tt['website']; ?></bdo>
            <bdo class="company-name"><?php echo $tt['name']; ?></bdo>
            <bdo class="location"><?php echo $tt['location']; ?></bdo>

            <div class="hidden">
              
              <bdo class="description"><b>Skills Required:</b>&nbsp;&nbsp;<?php echo $d['skills']; ?></bdo>
              <bdo class="description"><b>Posts:</b>&nbsp;&nbsp;Called to be appointed as <?php echo $d['post']; ?></bdo>
              <bdo class="description"><b>Number of Posts:</b>&nbsp;&nbsp;<?php echo $d['no']; ?></bdo>
              <bdo class="description"><b>Salary (in LPA):</b>&nbsp;&nbsp;<?php echo $d['salary']." LPA"; ?></bdo>
              <bdo class="description"><b>Deadline for application:</b>&nbsp;&nbsp;<?php echo $d['deadline']; ?></bdo>
              <bdo class="description"><b>About this Job:</b>&nbsp;&nbsp;<?php echo $d['about']; ?></bdo>

            </div>

          </td>

          </table>

        </div>

        <?php } } } } } } ?>

    </div>


  </body>

</html>

<?php
  } 
  }
?>