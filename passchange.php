<?php
session_start();
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
   
</head>
<body>
 <div class="container">
        <div class="row mt-5 mb-5 justify-content-center">
            <div class="col-md-6 mt-3" >
            <form class="form-signin" method="post" action="checkpass.php">
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputPassword"><b>New Password</b></label>
                        <input type="password" id="inputPassword" name="npassword"  class="form-control" placeholder="Put the new password">
                        
                    </div>
                </div>
                     
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputPassword"><b>Old Password</b></label>
                        <input type="password" id="inputPassword" name="opassword"  class="form-control"  placeholder="Put the old password">
                        
                    </div>
                </div>
                   
                      <input type="text" value="<?php echo $_GET['id'] ?>" name="id" hidden>   
               

                      
                <div class="form-row">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Change</button>
                        <button type="reset" class="btn btn-danger btn-lg" >Reset</button>

                
                    </div>
                </div>
            </form>
     </div>
    </div> 
    </div>
    
    
</body>
</html>