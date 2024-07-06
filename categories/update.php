<?php
$categoryId = $_POST["id"];
$categoryName = $_POST["name"];

$sql = "UPDATE categories SET name = '$categoryName' WHERE id = $categoryId";
$connection = mysqli_connect('localhost', 'root', '','task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>
