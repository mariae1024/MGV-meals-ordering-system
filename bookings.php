<?php
session_start();
require_once('connect.php');
$id = $_GET['id'];
$ReadSql = "SELECT * FROM product_cars WHERE id='$id'";
$res = mysqli_query($connection, $ReadSql);

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
            <form class="form-signin" method="post" action="sendbookings.php">
                <h1 class="h3 font-weight-normal" style="background-color:lightskyblue;border: 1px solid grey;">Bookings</h1>
                
                <div class="form-row">
                  <div class="form-group col-md-6">
                        <label for="inputfname"><b>First Name</b></label>
                        <input type="text" name="fname" class="form-control" pattern="[A-Za-z ]{1,15}" placeholder="Insert your first name">
                        
                        
                    </div>
                  <div class="form-group col-md-6">
                        <label for="inputlname"><b>Last Name</b></label>
                        <input type="text" name="lname" class="form-control" pattern="[A-Za-z ]{1,15}" placeholder="Insert your last name">
                        
                        
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputEmail"><b>Email</b></label>
                        <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Insert your email">
                        
                        
                    </div>
                </div>
                
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputPhone"><b>Phone Number</b></label>
                        <input type="number" id="phone" name="phone"  class="form-control" pattern="[0-9 ]{1,20}" placeholder="Insert your phone number">
                        
                    </div>
                </div>
                    
                 <div class="form-row">
                  <div class="form-group col-md-12">
                        <label for="inputPhone"><b>Address</b></label>
                        <input type="text" id="address" name="address"  class="form-control" pattern="[a-zA-Z0-9 ]{2,50}" placeholder="Insert your address">
                        
                    </div>
                </div>
                     
                     
                 <div class="form-row">
                  <div class="form-group col-md-6">
                        <label for="inputphone"><b>Start date</b></label>
                        <input type="date" name="sdate" class="form-control" placeholder="Select the starting date">
                    </div>
                  <div class="form-group col-md-6">
                        <label for="inputphone"><b>End date</b></label>
                        <input type="date" name="edate" class="form-control" placeholder="Select the ending date">
                    </div>
                </div>
                      
               <div hidden>
                   <input type="text" name="userId" value="<?php echo $_SESSION['id']; ?>">
                    <?php while($r=mysqli_fetch_assoc($res)):?>
                   <input type="text" name="carId" value="<?php echo $r['id']; ?>">
                    <?php endwhile; ?>
               </div>

                      
                <div class="form-row">
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg ml-2" type="submit" name="bookings">Send</button>

                        <button type="reset" class="btn btn-danger btn-lg" >Reset</button>
                    </div>
                </div>
        
    </form>
    
                      </div>
                  </div>
</div>
  
  
  
      
      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>