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
    
   
<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $phoneErr = $selectErr = $passwordErr = $statusErr = "";
$fname = $lname = $email = $phone = $password = $role = $status = "";

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

if(!isset($_POST['select_box'])){
  $selectErr = "You forgot to select the Role!";

}else{
    $role = $_POST['select_box'];
}
    
if(!isset($_POST['status_select_box'])){
  $statusErr = "You forgot to select the Status!";

}else{
    $status = $_POST['status_select_box'];
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
                  <div class="form-group col-md-12">
                        <label for="inputRole"><b>Role</b></label>
                          <select name="select_box">
                            <option value=""></option>
                            <option value="admin">admin</option>  
                            <option value="staff">staff</option>
                            <option value="costumer">customer</option>
                        </select>
                        <span class="error"><?php echo $selectErr;?></span>
                        
                        
                    </div>
                </div>
                     
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputRole"><b>Status</b></label>
                          <select name="status_select_box">
                            <option value=""></option>
                            <option value="enable">enable</option>  
                            <option value="disable">disable</option>
                        </select>
                        <span class="error"><?php echo $statusErr;?></span>
                        
                        
                    </div>
                </div>
                      
               

                      
                <div class="form-row">
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg ml-2" type="submit">Add user</button>

                        <button type="reset" class="btn btn-danger btn-lg" >Reset</button>
                    </div>
                </div>
        
    </form>
    
                      </div>
                  </div>
</div>
   
   
<?php
    include 'connect.php';
    
    if($fname != "" && $lname != ""  && $email != "" && $password !="" && $phone !="" && $role !="" && $status !=""){
        if($fnameErr == "" && $lnameErr == ""  && $emailErr == "" && $passwordErr =="" && $phoneErr =="" && $selectErr =="" && $statusErr ==""){
        $sql="INSERT INTO user (fname,lname,email,password,phone,role,status) 
         VALUES ('$fname', '$lname', '$email', '$password', '$phone', '$role','$status')";
        if(mysqli_query($connection,$sql)){
            echo "New user account successfully created!<br>";
            echo '<p>Go back to <a href="adminstaffusers.php" class="text-blue">Admin panel</a></p>';
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
    

     

      
      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body> 
</html>