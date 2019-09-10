<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <link href="mylogin.css" rel="stylesheet">
    <style>
    .error {color: #FF0000;}
    </style>
    
</head>
<body>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
         <div class="row mt-5">
             <div class="col-md-8">
              <h4 class="text-white">About MGV</h4>
                <p class="text-justify text-muted">MGV rentals is a leading car hire company based in Auckland since 2012. We started with only 3 staff members and now we are a huge and reputative company in New Zealand. In recent years we have established our business throughout Auckland and New Zealand. We offer different kind of cars for hire on very reasonable and competitive prices. We guarantee competitive prices throughout Auckland, however if you find lower rates than us, we will make sure to beat it.
                </p>
                <p class="text-justify text-muted">We will help you find a car suitable according to your needs at fair prices. Here at MGV we believe in giving you a great experience at every time you hire a car. We have a huge variety of cars in our portfolio. </p>
                <p class="text-justify text-muted">Why use us? Its simple simplify your car search and make sure to provide you the best service by helping you out to find the best car at very reasonable and competitive prices.
                </p>
                </div>
                <div class="offset-md-2"><!-- moving content ro rigth-->
                <h4 class="text-white">User tools</h4>
                            <ul class="list-unstyled">
                            <?php
                                  if(!isset($_SESSION["is_auth"])) {
                                    echo '<li><a href="Register.php" class="text-white">Register</a></li>';
                                    echo '<li><a href="mylogin.php" class="text-white">Log in</a></li>';
                                  }
                                
                                if(isset($_SESSION["is_auth"])){
                                $ath=$_SESSION["is_auth"];
                                $role=$_SESSION['role']=='admin'||'staff';
                                if($ath&&$role){
                                    echo '<li><a href="adminstaff.php" class="text-white">Admin panel</a></li>';
                                }
                                    }

                                  if(isset($_SESSION["is_auth"])) {
                                    echo '<li><a href="profile.php?id='. $_SESSION["id"] .'" class="text-white">Profile</a></li>';
                                    echo '<li><a href="logout.php" class="text-white">Log out</a></li>';
                                  }

                                  
                            ?>
                            </ul>
                </div>
            </div>
        </div>
  </div>
  <nav class="navbar fixed-top navbar-dark bg-dark nav-pills"><!-- hovering with jqury not working-->
   <a class="navbar-brand nav-link" href="index.php">MGV</a>
   <ul class="nav nav-pills mr-auto m-n3"><!-- m-n3 margin negative 3 mr-auto moving group to left by putting margin on right-->
  <li class="nav-item">
    <a class="nav-link" href="Vehicles.php">Vehicles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ContactUs.php">Contact Us</a>
  </li>
</ul>
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span><!-- collapse item means that appears when in clicked, data-target and controls is pointing the content that is gonna be showed when it collapse-->
    </button>
  </nav>
   
<?php
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file */
require 'C:\xampp\composer\vendor\autoload.php';
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $phoneErr = $passwordErr = "";
$fname = $lname = $email = $phone = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First name is required";
  } else {
      
      if (preg_match("/^[a-zA-Z ]+$/",$fname =$_POST["fname"])) {
        $fname =$_POST["fname"];
      }
      else{
        $fnameErr="First name is invalid";  
      }
    
  }
    
if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } else {
    if (preg_match("/^[a-zA-Z ]+$/",$lname =$_POST["lname"])) {
        $lname =$_POST["lname"];
      }
      else{
        $lnameErr="Last name is invalid";  
      }
    
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
      //first check if this email is actually a valid email address
      if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
          
          $email =$_POST["email"];
      }
      else{
          $emailErr="This is an invalid email format";
      }
    
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Fill password";
  } else {
    $password = $_POST["password"];
  }
    
if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
  } else {
    if (preg_match("/^[0-9 ]+$/",$phone =$_POST["phone"])) {
        $phone =$_POST["phone"];
      }
      else{
        $phoneErr="Phone number is invalid";  
      }
    
  }

  
}


?>   
   
<div class="container">
        <div class="row mt-5 mb-5 justify-content-center">
            <div class="col-md-6 mt-3" >
            <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 class="h3 font-weight-normal">Please fill the values to register</h1>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputfname"><b>First Name</b></label>
                        <input type="text" name="fname" class="form-control" placeholder="Fist Name">
                        <span class="error"><?php echo $fnameErr;?></span>
                        
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputlname"><b>Last Name</b></label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name">
                        <span class="error"><?php echo $lnameErr;?></span>
                        
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputEmail"><b>Email</b></label>
                        <input type="email" name="email" class="form-control" placeholder="example@example.com">
                        <span class="error"><?php echo $emailErr;?></span>
                        
                    </div>
                </div>
                
                 <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputphone"><b>Phone number</b></label>
                        <input type="number" name="phone" class="form-control" placeholder="Phone number">
                        <span class="error"><?php echo $phoneErr;?></span>
                        
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputPassword"><b>Password</b></label>
                        <input type="password" id="inputPassword" name="password"  class="form-control" placeholder="Password">
                        <span class="error"><?php echo $passwordErr;?></span>
                    </div>
                </div>
                      
               

                      
                <div class="form-row">
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg ml-2" type="submit">Sign in</button>

                        <button type="reset" class="btn btn-danger btn-lg" >Reset</button>
                    </div>
                </div>
        
    </form>
    
                      </div>
                  </div>
</div>
   
   
<?php
    include 'connect.php';
    
    function sendAccountConfirmationEmail($email,$fname,$lname){
                /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions */
                $mail= new PHPMailer(TRUE);

                /* Open the try/catch block. */
                try{
                    /* Set the mail sender. */
                    $mail->setFrom('mm.gdit.ip@gmail.com','Maria GDIT Support');
                    /*echo "Hmm<br><br>"; /* just a debug trace statement */

                    /* Add a recipient. */
                    $mail->addAddress($email,$fname);

                    /* Set the subject */
                    $mail->Subject = "PHP Confirm Account Registration Test Email";

                    /* Set the mail message body. */
                    $mail->Body = 'Hi, ' . $fname . ' Your account has successfully been created. Your last name is ' . $lname . ' and your email address is ' . $email ;
                    /*echo "Howdy<br><br>"; /* just a debug trace statement */

                    /* SMTP parameters. */
                    $mail->isSMTP();

                    /*SMTP server address */
                    $mail->Host = 'smtp.gmail.com';

                    /* Use SMTP authentication. */
                    $mail->SMTPAuth = TRUE;

                    /* Set the encryption system */
                    $mail->SMTPSecure = 'tls';

                    /*SMTP authentication username. */
                    $mail->Username = 'mm.gdit.ip@gmail.com';

                    /*SMTP authentication password */
                    $mail->Password = 'Mailer@123';

                    /*Set the SMTP port */
                    $mail->Port = 587;

                    /* Finally send the email */
                    $mail->send();
                    /*echo "<b>Mail sent sucessfully<b><br><br>";/* just a debug trace statement */ 
                }
                catch (Exception $e){
                    /* PHPMailer exception*/
                    echo "First catch<br>";
                    echo $e->errorMessage();
                }
                catch (\Exception $e){
                    /* PHP exception (note the backslash to select the global namespace Exception class)*/
                    echo "Second catch<br>";
                    echo $e->getMessage();
                }

            }
    
    if($fname != "" && $lname != ""  && $email != "" && $password !="" && $phone !=""){
        if($fnameErr == "" && $lnameErr == ""  && $emailErr == "" && $passwordErr =="" && $phoneErr ==""){
        $sql="INSERT INTO user (fname,lname,email,password,phone,role) 
         VALUES ('$fname', '$lname', '$email', '$password', '$phone', 'customer')";
        if(mysqli_query($connection,$sql)){
            echo "<b>". $fname . ", your account with email address " . $email . " has been created.You will receive a confirmation email shortly<b><br><br>";
            sendAccountConfirmationEmail($email,$fname,$lname);
            
        }
        else{
            echo "Error inserting new user account: " . mysqli_error($connection);;
        }
        }
    }
    else{
        echo "<h3>Please ensure all fields are filled in and are valid</h3>";
    }
?>
    

     
<footer class="container-fluid bg-dark">
      <div class="row">
       <div class="col-md-9">
        <div id="social">
        <a class="facebookBtn smGlobalBtn" href="https://www.facebook.com/" ></a>
        <a class="twitterBtn smGlobalBtn" href="https://twitter.com/?lang=en" ></a>
        <a class="googleplusBtn smGlobalBtn" href="https://plus.google.com/discover" ></a>
        <a class="linkedinBtn smGlobalBtn" href="https://www.linkedin.com/" ></a>
        <a class="instagramBtn smGlobalBtn" href="https://www.instagram.com/?hl=en" ></a>
    </div>
    </div>
    
       <div class="col-md-3">
        All rights reserved @ MGV.Ltd 2019
        </div>
        </div>
    </footer>
      
      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body> 
</html>