<?php
//$priorityId = $_POST["id"];
$priorityName = $_POST["name"];
$priorityColor = $_POST["color"];

$sql = "INSERT INTO priorities (name, color) VALUES ('$priorityName', '$priorityColor')";

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
mysqli_query($connection, $sql);
header("Location: list.php");
?>

