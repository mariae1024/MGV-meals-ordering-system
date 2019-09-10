<?php
session_start();

$error=''; //Variable to Store error message;
    if(empty($_POST['email']) || empty($_POST['password'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = "Email or Password is Invalid";
            
        }
        
        // complete this error check yourself
    }
    else
    {
        //Define $user and $pass
        $user=$_POST['email'];
        $pass=$_POST['password'];
        //Establishing Connection with server by passing server_name, user_id and pass as a parameter
        $conn = mysqli_connect("localhost", "root", "");
        //Selecting Database
        $db = mysqli_select_db($conn, "cars");
        //sql query to fetch information of registered user and find user match.
        $query = mysqli_query($conn, "SELECT * FROM user WHERE password='$pass' AND email='$user'");
        $rows = mysqli_num_rows($query);
        
    if($rows == 1){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['role'] = $row['role'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['status'] = $row['status'];
        
    
        $_SESSION["is_auth"] = true;
        if($_SESSION['role'] != 'customer'){
           header("Location: adminstaffusers.php"); 
        }
        else{
            header("Location: index.php"); // Redirecting to other page
        }
         
    }
        
    else
    {
     
         echo '<script type="text/javascript">
         alert("Unknown account or password, please try again"); 
         window.location.href ="mylogin.php";
         </script>';
       //header("Location: mylogin.php"); // Redirecting to other page
       /* mysqli_close($conn); // Closing connection*/
    }
    }

?>