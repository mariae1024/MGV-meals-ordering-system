<?php
session_start();
require_once('connect.php');
$page = 1;
$ReadSql = "SELECT * FROM user";
$res = mysqli_query($connection, $ReadSql);

$number_of_rows_in_query = mysqli_num_rows($res);
$number_of_rows_per_page = 10;
$total_number_of_pages = ceil($number_of_rows_in_query / $number_of_rows_per_page);

if (isset($_GET['page'])) {

$page = ($_GET['page'] - 1) * $number_of_rows_per_page;
  
}

$sql = "SELECT * FROM user LIMIT $page, $number_of_rows_per_page"; 

$res = mysqli_query($connection, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>MGV</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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

       <div class="container-fluid mt-5">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar nav-pills mt-3">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="adminstaff.php">
                  <span class="fa fa-fw fa-bar-chart"></span><!-- fa-fw ensure proper alignment of the icons-->
                  Reports
                </a>
              </li>
              <?php
                if(isset($_SESSION["is_auth"])) {
                    $role=$_SESSION['role']=='admin';
                    if($role){
                      echo '<li class="nav-item">
                        <a class="nav-link active" href="adminstaffusers.php">
                          <span class="fa fa-fw fa-users"></span>
                          Admin/Staff/Users
                        </a>
                      </li>';
                    }
                }
                  ?>
              <li class="nav-item">
                <a class="nav-link" href="adminstaffcars.php">
                  <span class="fa fa-fw fa-shopping-cart"></span>
                  Cars
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">
                  <span class="fa fa-fw fa-file"></span>
                  Orders
                </a>
              </li>
              <?php
                if(isset($_SESSION["is_auth"])) {
                    $role=$_SESSION['role']=='admin';
                    if($role){
                      echo '<li class="nav-item">
                        <a class="nav-link" href="feedback.php">
                          <span class="fa fa-fw fa-inbox"></span>
                          Feedback
                        </a>
                      </li>';
                    }
                }
                ?>
            </ul>

            
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <!-- Modal -->
  <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="deleteUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm delete action</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this user?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          
          <a href="#" class="btn btn-danger"  id="modalDelete" >Delete</a>  
          </div>
        </div>
      </div>
    </div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Our crew and users</h1>
        
</div>

<div class="table-responsive">
<table class="table table-striped table-sm">
  
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Phone</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
           <?php 
		            while($r = mysqli_fetch_assoc($res)):?>
		            	<tr> 
		            		<td><?php echo $r['id']; ?></td> 
		            		<td><?php echo $r['fname']; ?></td> 
		            		<td><?php echo $r['lname']; ?></td> 
		            		<td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['password']; ?></td>
                            <td><?php echo $r['phone']; ?></td>
                            <td><?php echo $r['role']; ?></td>
                            <td><?php echo $r['status']; ?></td>
                    <td>
                    <a href="updateuser.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                    
		            			<!--write the delete code yourself-->
                      
                      <button type="button" class="btn btn-danger trash" data-toggle="modal" data-id="<?php echo $r['id']; ?>" data-target="#deleteuser" > Delete</button></td>
                        <?php endwhile; ?>
              </tbody>
                
                       
              
            </table>
              
    <?php for ($page = 1; $page < $total_number_of_pages + 1; $page++): ?>
                <span class="page"><a href="?page=<?php echo $page ?>"><?php echo $page ?></a></span>
                 <?php endfor; ?> 
                 <br><br>
               
    <a href="adduser.php"><button type="button" class="btn btn-success mb-5" >Add User/Admin/Staff</button></a>
   <!--              <nav aria-label="Page navigation example">
 <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#">Previous</a>
    </li>
    <li class="page-item active"><a class="page-link" href="#page1">1</a></li>
    <li class="page-item"><a class="page-link" href="#page2">2</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>-->   
         
          </div>
        </main>
        
      </div>
     
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href',' deleteuser.php?id='+id);
      })
    </script>
   

  </body>
</html>
