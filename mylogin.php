<?php
include("loginserv.php");
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="mylogin.css" rel="stylesheet">
    <script type="text/javascript" src="mylogin.js"></script>
  
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
     
        
      
      
      
<div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-8 mt-3" >
            <form class="form-signin ml-5" method="post" action="loginserv.php">
                <h1 class="h3 font-weight-normal ml-5">Please sign in</h1>
                <p class="ml-5"><span class="error"><?php echo $error;?></span></p>
                <div class="form-row ml-5">
                  <div class="form-group col-md-10">
                        <label for="inputEmail"><b>Email</b></label>
                        <input type="email" name="email" class="form-control" placeholder="example@example.com" onchange="emailregular()" id="loginMail" required autofocus>
                        
                    </div>
                </div>
                <div class="form-row ml-5">
                  <div class="form-group col-md-10">
                        <label for="inputPassword"><b>Password</b></label>
                        <input type="password" id="inputPassword" name="password"  class="form-control" placeholder="Password" required>
                    </div>
                </div>

                      <!--Google recaptch -->
                <div class="form-row">
                    <div class="form-group ml-5">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-3">
                        <div class="g-recaptcha" data-sitekey="" ></div>
                        </div>
                    </div>
                </div>
                    
                    <div class="form-group ml-5">
                        <button class="btn btn-primary btn-lg ml-2" type="submit">Log in</button>

                        <button type="reset" class="btn btn-danger btn-lg" >Reset</button>

                        <span class="psw">Forgot <a href="passreccovery.php">password?</a></span>
                
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
      
      
      
      
       <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
       

</html>