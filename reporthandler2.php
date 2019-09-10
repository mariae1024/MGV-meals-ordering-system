<?php
require_once('connect.php');
$page = 1;
$myval='available';
$ReadSql = "SELECT product_cars.name,COUNT(product_cars.name) as 'availability' FROM `product_cars` WHERE product_cars.status=$myval";


$res = mysqli_query($connection, $ReadSql);

if($res){

    $name=array();
    $availability=array();

    while($r = mysqli_fetch_assoc($res)){

        array_push($name,$r['name']);
        array_push($availability,$r['availability']);
    }

    $reportObj= new \stdClass();
    $reportObj->name=$name;
    $reportObj->availability=$availability;
    
    $myJSON = json_encode($reportObj);
    
    echo $myJSON;

}
?>