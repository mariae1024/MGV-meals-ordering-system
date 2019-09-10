<?php
require_once('connect.php');
$page = 1;
$ReadSql = "SELECT user.email,COUNT(bookings.id) as 'requests' FROM `bookings`,`user` WHERE user.id=bookings.user_id group by email ";
$res = mysqli_query($connection, $ReadSql);

if($res){

    $username=array();
    $requests=array();

    while($r = mysqli_fetch_assoc($res)){

        array_push($username,$r['email']);
        array_push($requests,$r['requests']);
    }

    $reportObj= new \stdClass();
    $reportObj->username=$username;
    $reportObj->request=$requests;
    
    $myJSON = json_encode($reportObj);
    
    echo $myJSON;

}
?>