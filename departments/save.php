<?php
//$departmentId = $_POST["id"];
$departmentName = $_POST["name"];

$sql = "INSERT INTO departments (name) VALUES ('$departmentName')";

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>

