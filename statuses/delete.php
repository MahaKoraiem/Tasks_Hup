<?php
$statusId = $_GET["statusid"];
$sql = "DELETE FROM statuses WHERE id = $statusId";
$connection = mysqli_connect('localhost', 'root', '','task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>
