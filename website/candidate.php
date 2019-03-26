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

        if(!isset($_POST['job_id']) || !isset($_POST['company_name']) || !isset($_POST['name'])){
            echo "Internal Error Occured";
        }
        else{

            $job_id = $_POST['job_id'];
            $company_name = $_POST['company_name'];
            $name = $_POST['name'];

            $query = mysql_query("INSERT INTO sel(job_id, company_name, name) VALUES ('$job_id', '$company_name', '$name')");
            if($query == FALSE){
                die(mysql_error());
            }
            else{
                echo "Candidate Selected";
            }
        }


?>