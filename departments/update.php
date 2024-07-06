<?php
$departmentId = $_POST["id"];
$departmentName = $_POST["name"];

$sql = "UPDATE departments SET name = '$departmentName' WHERE id = $departmentId";

$connection = mysqli_connect('localhost', 'root', '','task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");
?>

