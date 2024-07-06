<?php
$cityId = $_POST["id"];
$cityName = $_POST["name"];

$sql = "UPDATE cities SET name = '$cityName' WHERE id = $cityId";

$connection = mysqli_connect('localhost', 'root', '','task_hup');

mysqli_query($connection, $sql);
header("Location: list.php");
?>

