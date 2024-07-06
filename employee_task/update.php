<?php
$employeeId = $_POST["emp_id"];
$employeeName = $_POST["name"];
$employeePhone = $_POST["phone"];
$employeeBirthDate = $_POST["b_date"];
$employeeDepartmentId = $_POST["department_id"];
$employeeCityId = $_POST["city_id"];
//$employeeImage = $_POST["emp_image"];

if(isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != ""){
    $tmp = $_FILES["image"]["tmp_name"];
    $location = "../img/employees/";
    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $filename = strtolower($_POST["name"]);
    $filename = str_replace(" ", "_", $filename);
    $filename = $filename . "_" . date("Y-m-d-H-i-s") . "." . $ext;
    move_uploaded_file($tmp, $location . $filename);
    $sql = "UPDATE employees SET image = '$filename', name = '$employeeName', phone = '$employeePhone', birth_date = '$employeeBirthDate', department_id = $employeeDepartmentId, city_id = $employeeCityId WHERE id = $employeeId";
}else {
    $sql = "UPDATE employees SET name = '$employeeName', phone = '$employeePhone', birth_date = '$employeeBirthDate', department_id = $employeeDepartmentId, city_id = $employeeCityId WHERE id = $employeeId";
}


$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");
?>

