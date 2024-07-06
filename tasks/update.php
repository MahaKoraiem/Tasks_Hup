<?php
$name = $_POST["name"];
$desc = $_POST["task_description"];
$due = $_POST["due_date"];
//$emp = $_POST["employee_id"];
$cat = $_POST["category_id"];
$priority = $_POST["priority_id"];
$id = $_POST["task_id"];

$sql = "UPDATE tasks SET name = '$name', description = '$desc', priority_id = $priority, category_id = $cat, due_date = '$due' WHERE id = $id";

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");
?>