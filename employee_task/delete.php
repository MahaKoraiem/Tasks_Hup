<?php
$id = $_GET["empid"];

$sql = "DELETE FROM employees WHERE id = $id";
$connection = mysqli_connect('localhost', 'root', '','task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>
