<?php
//$cityId = $_POST["id"];
$cityName = $_POST["name"];

$sql = "INSERT INTO cities (name) VALUES ('$cityName')";

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>

