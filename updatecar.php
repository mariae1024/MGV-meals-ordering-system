<?php
require_once('connect.php');
$id = $_GET['id'];
$SelSql = "SELECT * FROM product_cars WHERE id=$id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);
if(isset($_POST) & !empty($_POST)){
	$name = $_POST['name'];
	$year = $_POST['year'];
	$kilometers = $_POST['kilometers'];
    $engine = $_POST['engine'];
    $fuel = $_POST['fuel'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $status = $_POST['status'];
	$UpdateSql = "UPDATE product_cars SET name='$name', year='$year', kilometers='$kilometers', engine='$engine', fuel='$fuel', model='$model', price='$price', status='$status' WHERE id=$id";
	$res = mysqli_query($connection, $UpdateSql);
	if($res){
		header('Location: adminstaffcars.php');
	}else{
        $fmsg = "Failed to update data." . mysqli_error($connection);
        echo $fmsg;
	}
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col">
    
		<form method="POST" class="form-horizontal col-md-6 col-md-offset-3">
		<h2>UPDATE Car</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="name" class="form-control" id="input7" value="<?php echo $r['name']; ?>" placeholder="<?php echo $r['name']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Year</label>
			    <div class="col-sm-10">
			      <input type="number" name="year"  class="form-control" id="input2" value="<?php echo $r['year']; ?>" placeholder="<?php echo $r['year']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Kilometers</label>
			    <div class="col-sm-10">
			      <input type="number" name="kilometers"  class="form-control" id="input3" value="<?php echo $r['kilometers']; ?>" placeholder="<?php echo $r['kilometers']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Engine size</label>
			    <div class="col-sm-10">
			      <input type="number" name="engine"  class="form-control" id="input3" value="<?php echo $r['engine']; ?>" placeholder="<?php echo $r['engine']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Fuel Type</label>
			    <div class="col-sm-10">
			      <input type="text" name="fuel"  class="form-control" id="input3" value="<?php echo $r['fuel']; ?>" placeholder="<?php echo $r['fuel']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Model Details</label>
			    <div class="col-sm-10">
			      <input type="text" name="model"  class="form-control" id="input3" value="<?php echo $r['model']; ?>" placeholder="<?php echo $r['model']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Price</label>
			    <div class="col-sm-10">
			      <input type="text" name="price"  class="form-control" id="input3" value="<?php echo $r['price']; ?>" placeholder="<?php echo $r['price']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Status</label>
			    <div class="col-sm-10">
			      <input type="text" name="status"  class="form-control" id="input3" value="<?php echo $r['status']; ?>" placeholder="<?php echo $r['status']; ?>" />
			    </div>
			</div>
			
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>
    </div>
    </div>
    </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>