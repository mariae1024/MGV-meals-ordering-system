<?php
require_once('connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM user WHERE Id=$id";

if ($connection->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: adminstaffusers.php');
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}

$connection->close();






?>