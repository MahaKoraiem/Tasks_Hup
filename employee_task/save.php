<?php
//$employeeId = $_POST["id"];
$employeeName = $_POST["name"];
$employeePhone = $_POST["phone"];
$employeeBirthDate = $_POST["b_date"];
$employeeDepartmentId = $_POST["department_id"];
$employeeCityId = $_POST["city_id"];


$sql = "INSERT INTO employee_task (task_id, employee_id) VALUES ()";


$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");

// echo $_FILES["image"]["name"]  . "<br>";
// echo $_FILES["image"]["tmp_name"] . "<br>";
// echo $_FILES["image"]["size"] . "<br>";
// echo $_FILES["image"]["type"] . "<br>";
?>

