<?php
$priorityId = $_GET["priid"];
$sql = "DELETE FROM priorities WHERE id = $priorityId";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
mysqli_query($connection, $sql);
header("Location: list.php");
?>

