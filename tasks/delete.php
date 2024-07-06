<?php
$id = $_GET["taskid"];

$sql = "DELETE FROM tasks WHERE id = $id";
$connection = mysqli_connect('localhost', 'root', '','task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");
?>