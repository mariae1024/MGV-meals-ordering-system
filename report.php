<?php
session_start();
require_once('connect.php');




?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Orders List</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="plotly-latest.min.js"></script>
  </head>

  <body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            
          <!--  <a href="src/deleteRepository.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-primary" >Delete</button></a> -->
          <a href="#" class="btn btn-danger"  id="modalDelete" >Delete</a>  
          </div>
        </div>
      </div>
    </div>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Menu</h4>
              <ul class="list-unstyled">
              <?php
                if(!isset($_SESSION["is_auth"])) {
                  echo '<li><a href="src/registration_form.php" class="text-white">Register</a></li>';
                  echo '<li><a href="src/login.php" class="text-white">Log in</a></li>';
                  
                }
                
                if($_SESSION["is_auth"]) {
                  echo '<li><a href="src/logout.php" class="text-white">Log out</a></li>';
                 
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="home.php" class="navbar-brand d-flex align-items-center">
            
            <strong>Car rentals Auckland</strong>
            </a>
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    <div class="container-fluid">
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="admin_view_orders.php">
                    <span data-feather="file"></span>
                    Orders
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin_view_products.php">
                    <span data-feather="shopping-cart"></span>
                    Products
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admin.php">
                    <span data-feather="users"></span>
                    Customers
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="src/admin_update_products.php">
                    <span data-feather="layers"></span>
                    Add a new car
                  </a>
                </li>

              </ul>
            </div>
        </nav> 
        </div>    
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Admin panel</h1>

        </div>
      </section>
      <h2>Reports</h2>
    <div id="myDiv"></div>
       <div id="myDiv2"></div>   
    </main>
    </div>         

  


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "reporthandler.php", true);

        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        reportData = JSON.parse(this.responseText);
        
        var usernames= reportData.username;
        var requests= reportData.request;

        var data=
        [{
            x:usernames,
            y: requests,
            type: 'bar'
        }
        ];
            

        Plotly.newPlot('myDiv', data);
        }
        };
        
        xmlhttp.send();
        </script>
        
        <script>
            var trace1 = {
              x: [1, 2, 3],
              y: [4, 5, 6],
              type: 'scatter'
            };

            var trace2 = {
              x: [20, 30, 40],
              y: [50, 60, 70],
              type: 'scatter',
              xaxis: 'x2',
              yaxis: 'y',
            };

            var data = [trace1, trace2];

            var layout = {
              grid: {subplots:[['xy', 'x2y']]},
            };

            var gd = document.getElementById('myDiv2')
            Plotly.newPlot(gd, data, layout, {showSendToCloud: true});

            gd.on('plotly_selected', function(eventData) {
              console.log(eventData);
            })
        /*var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "reporthandler2.php", true);

        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        reportData = JSON.parse(this.responseText);
        
        var name= reportData.name;
        var availability= reportData.availability;

        var data=
        [{
            x:name,
            y: availability,
            type: 'bar'
        }
        ];

        Plotly.newPlot('myDiv2', data);
        }
        };
        
        xmlhttp.send();*/
        </script>

    

  </body>
</html>
