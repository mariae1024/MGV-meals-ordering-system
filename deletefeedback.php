<?php
require_once('connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM contact WHERE Id=$id";

if ($connection->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: feedback.php');
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}

$connection->close();






?>