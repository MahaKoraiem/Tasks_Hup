<?php
$categoryId = $_GET["catid"];
$sql = "DELETE FROM categories WHERE id = $categoryId";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>
