<?php
require_once('connect.php');
$id = $_GET['id'];
$SelSql = "SELECT * FROM user WHERE id=$id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);
if(isset($_POST) & !empty($_POST)){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $status = $_POST['status'];
	$UpdateSql = "UPDATE user SET fname='$fname', lname='$lname', email='$email', password='$password', phone='$phone', role='$role', status='$status' WHERE id=$id";
	$res = mysqli_query($connection, $UpdateSql);
	if($res){
		header('Location: adminstaffusers.php');
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
		<h2>UPDATE User</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">First name</label>
			    <div class="col-sm-10">
			      <input type="text" name="fname"  class="form-control" id="input7" value="<?php echo $r['fname']; ?>" placeholder="<?php echo $r['fname']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Last name</label>
			    <div class="col-sm-10">
			      <input type="text" name="lname"  class="form-control" id="input2" value="<?php echo $r['lname']; ?>" placeholder="<?php echo $r['lname']; ?>" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" name="email"  class="form-control" id="input3" value="<?php echo $r['email']; ?>" placeholder="<?php echo $r['email']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="text" name="password"  class="form-control" id="input3" value="<?php echo $r['password']; ?>" placeholder="<?php echo $r['password']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      <input type="number" name="phone"  class="form-control" id="input3" value="<?php echo $r['phone']; ?>" placeholder="<?php echo $r['phone']; ?>" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Role</label>
			    <div class="col-sm-10">
			      <input type="text" name="role"  class="form-control" id="input3" value="<?php echo $r['role']; ?>" placeholder="<?php echo $r['role']; ?>" />
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