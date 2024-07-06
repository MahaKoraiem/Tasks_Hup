<?php
$priorityId = $_POST["id"];
$priorityName = $_POST["name"];
$priorityColor = $_POST["color"];
$sql = "UPDATE priorities SET name = '$priorityName', color = '$priorityColor' WHERE id = $priorityId";
$connection = mysqli_connect('localhost', 'root', '','task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>
