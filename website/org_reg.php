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
        } ?>

<?php 
      //Logging the company directly in
      if(isset($_POST['oindex_submit'])){
        if(trim($_POST['o_name']) != "" || trim($_POST['o_password']) != ""){
          $o_name = $_POST['o_name'];
          $o_password = $_POST['o_password'];

          $check = mysql_query("SELECT * FROM company WHERE name = '".$o_name."' AND password = '".$o_password."'") or die(mysql_error());
          
         //Checking if company already exists
         if(mysql_num_rows($check) > 0){
            $_SESSION['name'] = $o_name;
            header('location:company');    
          } 
        }
        else{
          header('location:org_reg?error=1');
        }
      }



      if(isset($_POST['o_submit'])){
        if(trim($_POST['o_name']) != "" || trim($_POST['o_password']) != ""){
          $o_name = $_POST['o_name'];
          $o_password = $_POST['o_password'];
          $o_estd = $_POST['o_estd'];
          $o_website = $_POST['o_website'];
          $o_location = $_POST['o_location'];
          $o_about = $_POST['o_about'];

          //QUERY for adding into the database
          $query = mysql_query("INSERT INTO company(name, password, estd, website, location, about) VALUES ('$o_name', '$o_password', '$o_estd', '$o_website', '$o_location', '$o_about')");

          if($query == FALSE){
            die(mysql_error());
          }
          else{
            $_SESSION['name'] = $o_name;
            header('location:company');
          }

        }
        else{
         header('location:org_reg?error=1'); 
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
    <div class="wrapper" style="margin-top: 70px;">
      <h1>Company Info</h1>
      <table>
        <tr><td colspan="2">
          <?php if(isset($_GET['error'])){ ?>
            <bdi class="error">&times;&nbsp;Make sure you have filled all the details correctly</bdi>
          <?php } ?>
          </td></tr>
          <tr><td>Organisation Name:</td><td><input type="text" name="o_name" value="<?php if(isset($_POST['o_name'])) echo $_POST['o_name']; ?>"></td></tr>          
          <tr><td>Password:</td><td><input type="password" name="o_password" value="<?php if(isset($_POST['o_password'])) echo $_POST['o_password']; ?>"></td></tr>
          <tr>
            <td>Estd in:</td>
            <td>
            <select name="o_estd">
              <?php for($i = 2020; $i >= 1980; $i--){  ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
               <? } ?>
            </select></td>
          </tr>

          <tr><td>Email:</td><td><input type="text" name="o_website"></td></tr>
          <tr><td>Location:</td><td><input type="text" name="o_location"></td></tr>
          <tr><td>About:</td><td><textarea name="o_about"></textarea></tr>

          <tr><td></td><td><button type="submit" name="o_submit">Register Company</button></td></tr>

        </table>
      </div>
    </form>
  </body>

</html>