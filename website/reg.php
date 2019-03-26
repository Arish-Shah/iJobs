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
          header('location:user');
        }
        if(isset($_SESSION['name']) || isset($_SESSION['email'])){
          header('location:company'); 
        }
 ?>



 <?php
        if(isset($_POST['login'])){
          if(trim($_POST['email']) != "" || trim($_POST['password']) != ""){
              //Form submission login comes here
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = mysql_query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
         
           if($result == FALSE){
              die(mysql_error());
            }
            if(mysql_num_rows($result) == 0){
                header('location:index?error=1');
            }
            else{
                $_SESSION['email'] = $email;
                header('location:feed'); 
            }
          }
          else{
              header('location:index?error=1');
          }            
        }





        //Adding a new User
        if(isset($_POST['submit'])){

          if(trim($_POST['email']) != "" || trim($_POST['password']) != ""){
            //Setting up the variables
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $location = $_POST['location'];
            $phone = $_POST['phone'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $interests = $_POST['interests'];
            $me = $_POST['me'];
            $designation = $_POST['designation'];
            $experience = $_POST['experience'];
            $prev = $_POST['prev'];
            $masters = $_POST['masters'];
            $m_year = $_POST['m_year'];
            $bachelors = $_POST['bachelors'];
            $b_year = $_POST['b_year'];
            $inter = $_POST['inter'];
            $i_year = $_POST['i_year'];
            $school = $_POST['school'];
            $s_year = $_POST['s_year'];
            $skills = $_POST['skills'];
            $achievements = $_POST['achievements'];

            $query = mysql_query("INSERT INTO users(name, email, password, location, phone, age, gender, interests, me, designation, experience, prev, masters, m_year, bachelors, b_year, inter, i_year, school, s_year, skills, achievements) VALUES ('$name', '$email', '$password', '$location', '$phone', '$age', '$gender', '$interests', '$me', '$designation', '$experience', '$prev', '$masters', '$m_year', '$bachelors', '$b_year', '$inter', '$i_year', '$school', '$s_year', '$skills', '$achievements')") or die(mysql_error());

            if($query == FALSE){
              header('location:reg?error=1');
            }
            else{
              $_SESSION['email'] = $email;
              header('location:feed');
            }

          }
          else{
            header('location:reg?error=1');
          }

        }

   ?>

<!DOCTYPE html>
<html>

  <head>

	<title>iJobs</title>

	<!--  CSS -->
	<link rel="stylesheet" type="text/css" href="css/reg.css">

	<!-- jQuery -->
	<script src="assets/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/index.js"></script>

  </head>

  <body>

    <!-- Navbar -->
    <div id="navbar">
      <div class="container">
        <img src="assets/img/logo.png" width="90">
        <bdi>Registration Form</bdi>
      </div>
    </div>


    <!-- The Form -->
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="wrapper" style="margin-top: 65px;">
        <h1>Personal Information</h1>
        <table>
          
          <tr><td colspan="2">
          <?php if(isset($_GET['error'])){ ?>
            <bdi class="error">&times;&nbsp;Make sure you have filled all the details correctly</bdi>
          <?php } ?>
          </td></tr>
          <tr><td>Name:</td><td><input type="text" name="name"></td></tr>
          <tr><td>Email Id:</td><td><input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"></td></tr>
          <tr><td>Password:</td><td><input type="password" name="password" value="<?php if(isset($_POST['email'])) echo $_POST['password']; ?>"></td></tr>
          <tr><td>Location:</td><td><input type="text" name="location"></td></tr>
          <tr><td>Phone:</td><td><input type="text" name="phone"></td></tr>
          <tr><td>Age:</td><td><input type="number" name="age"></td></tr>
          <tr><td>Gender:</td>
              <td>
                <input type="radio" name="gender" value="Male" checked="true"><label for="gender">Male</label>
                <input type="radio" name="gender" value = "Female"><label for="gender">Female</label>
              </td></tr>
          <tr><td>Interests:</td><td><textarea name="interests"></textarea></td></tr>
          <tr><td>About me:</td><td><textarea name="me"></textarea></tr>
        </table>

    </div>

    <div class="wrapper">
      <h1>Qualifications</h1>
      <table>
          <tr><td>Designation:</td><td><input type="text" name="designation"></td></tr>
          <tr><td>Experience:</td><td><input type="number" name="experience" value="0">&nbsp;&nbsp;Years</td></tr>
          <tr><td>Prev Organisation(s):</td><td><input type="text" name="prev"></td></tr>
          
          <tr>
            <td>Masters:</td>
            <td><input type="text" name="masters">
            <select name="m_year">
              <?php for($i = 2020; $i >= 1980; $i--){  ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
               <? } ?>
            </select></td>
          </tr>

          <tr>
            <td>Bachelors:</td>
            <td><input type="text" name="bachelors">
            <select name="b_year">
              <?php for($i = 2020; $i >= 1980; $i--){  ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
               <? } ?>
            </select></td>
          </tr>

          <tr>
            <td>Intermediate:</td>
            <td><input type="text" name="inter">
            <select name="i_year">
              <?php for($i = 2020; $i >= 1980; $i--){  ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
               <? } ?>
            </select></td>
          </tr>

          <tr>
            <td>Schooling:</td>
            <td><input type="text" name="school">
            <select name="s_year">
              <?php for($i = 2020; $i >= 1980; $i--){  ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
               <? } ?>
            </select></td>
          </tr>

          <tr><td>Skills:</td><td><input type="text" name="skills">&nbsp;&nbsp;*Separate with commas.</td></tr>
          <tr><td>Achievements:</td><td><input type="text" name="achievements">&nbsp;&nbsp;*Separate with commas.</td></tr>

          <tr><td></td><td><button type="submit" name="submit">Submit Resume</button></td></tr>

        </table>

      </div>
    </form>

  </body>

</html>