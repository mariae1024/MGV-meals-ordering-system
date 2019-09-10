<?php
require_once('connect.php');
$id = $_GET['id'];
$SelSql = "SELECT * FROM user WHERE id=$id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);
$role = $r['role'];
if(isset($_POST) & !empty($_POST)){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
	$UpdateSql = "UPDATE user SET fname='$fname', lname='$lname', email='$email', phone='$phone',role='$role' WHERE id=$id";
	$res = mysqli_query($connection, $UpdateSql);
	if($res){
		header('Location: profile.php?id='. $id .'');
	}else{
        $fmsg = "Failed to update data." . mysqli_error($connection);
        echo $fmsg;
	}
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <link href="mylogin.css" rel="stylesheet">
    
</head>
<body>

  
  
  <div class="container">
        <div class="row mt-5 mb-5 justify-content-center">
            <div class="col-md-6 mt-3" >
            <form class="form-signin" method="post">
                <h1 class="h3 font-weight-normal" style="background-color:lightskyblue;border: 1px solid grey;">Profile</h1>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputfname"><b>First Name</b></label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $r['fname']; ?>" placeholder="<?php echo $r['fname']; ?>">
                        
                        
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputlname"><b>Last Name</b></label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $r['lname']; ?>" placeholder="<?php echo $r['lname']; ?>">
                        
                        
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputEmail"><b>Email</b></label>
                        <input type="email" name="email" class="form-control" value="<?php echo $r['email']; ?>" placeholder="<?php echo $r['email']; ?>">
                        
                        
                    </div>
                </div>
                
                     
                     
                 <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputphone"><b>Phone number</b></label>
                        <input type="number" name="phone" class="form-control" value="<?php echo $r['phone']; ?>" placeholder="<?php echo $r['phone']; ?>">
                        
                        
                    </div>
                </div>
                      
               

                      
                <div class="form-row">
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg ml-2" type="submit">Save</button>

                        <button type="reset" class="btn btn-danger btn-lg" >Reset</button>
                    </div>
                </div>
        
    </form>
    
                      </div>
                  </div>
</div>
  
  
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