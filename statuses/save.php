<?php
$statusId = $_POST["id"];
$statusName = $_POST["name"];

$sql = "INSERT INTO statuses (name) VALUES ('$statusName')";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
mysqli_query($connection, $sql);
header("Location: list.php");
?>

