<?php 
require_once('connect.php');
if(isset($_POST['addcar'])){
    $name = $_POST['name'];
    $year = $_POST['year'];
    $kilometers = $_POST['kilometers'];
    $engine = $_POST['engine'];
    $fuel = $_POST['fuel'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $status = $_POST['status'];
    $sql = "INSERT INTO product_cars (name, year, kilometers, engine,fuel,model,price,image,status) VALUES ('$name','$year','$kilometers','$engine','$fuel','$model','$price','$file','$status')";
    if(mysqli_query($connection,$sql))
    {
        echo "Database was updated";
        header('Location: adminstaffcars.php');
    }
    else
    {
        echo mysqli_error($connection);
    }
}
?>