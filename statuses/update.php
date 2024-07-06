<?php
$statusId = $_POST["id"];
$statusName = $_POST["name"];

$sql = "UPDATE statuses SET name = '$statusName' WHERE id = $statusId";

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");
?>

