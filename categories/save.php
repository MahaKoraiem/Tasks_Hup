<?php
//$categoryId = $_POST["id"];
$categoryName = $_POST["name"];

$sql = "INSERT INTO categories (name) VALUES ('$categoryName')";

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");
?>

