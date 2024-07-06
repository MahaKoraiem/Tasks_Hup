<?php
$cityId = $_GET["cityid"];

$sql = "DELETE FROM cities WHERE id = $cityId";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
mysqli_query($connection, $sql);

?>

