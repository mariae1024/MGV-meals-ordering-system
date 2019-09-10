
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
    
		<form method="POST" class="form-horizontal col-md-6 col-md-offset-3" action="senddatacars.php">
		<h2>ADD Car</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="name" id="name" class="form-control" id="input7" placeholder="Insert car Name" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Year</label>
			    <div class="col-sm-10">
			      <input type="number" name="year" id="year" class="form-control" id="input2" placeholder="Insert year" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Kilometers (Km)</label>
			    <div class="col-sm-10">
			      <input type="number" name="kilometers" id="kilometers" class="form-control" id="input3" placeholder="Insert kilometers" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Engine size (cc)</label>
			    <div class="col-sm-10">
			      <input type="number" name="engine"  id="engine" class="form-control" id="input3" placeholder="Insert engine" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Fuel type</label>
			    <div class="col-sm-10">
			      <input type="text" name="fuel" id="fuel" class="form-control" id="input3" placeholder="Insert fuel type" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Model details</label>
			    <div class="col-sm-10">
			      <input type="text" name="model" id="model" class="form-control" id="input3" placeholder="Insert model details" />
			    </div>
			</div>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Price</label>
			    <div class="col-sm-10">
			      <input type="number" name="price" id="price" class="form-control" id="input3" placeholder="Insert price" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Image</label>
			    <div class="col-sm-10">
			      <input type="file" name="image" id="image" />   
                <br />  
			    </div>
			</div>
			
			
          <div class="form-group">
                <label for="inputRole" class="col-sm-2 control-label"><b>Status</b></label>
                 <div class="col-sm-10">
                  <select name="status">
                    <option value=""></option>
                    <option value="available">available</option>  
                    <option value="unavailable">unavailable</option>
                </select>
                 </div>



            </div>
                

			
			<button type="submit" name="addcar" class="btn btn-success col-md-2 col-md-offset-10">Add</button>
		</form>
    </div>
    </div>
    </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>