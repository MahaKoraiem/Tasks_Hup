<?php
$departmentId = $_GET["departid"];

$sql = "DELETE FROM departments WHERE id = $departmentId";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
mysqli_query($connection, $sql);

?>

