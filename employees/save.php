<?php
//$employeeId = $_POST["id"];
$employeeName = $_POST["name"];
$employeePhone = $_POST["phone"];
$employeeBirthDate = $_POST["b_date"];
$employeeDepartmentId = $_POST["department_id"];
$employeeCityId = $_POST["city_id"];

if(isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] != ""){
    /* FILe UPLOAD*/
    $tmp = $_FILES["image"]["tmp_name"];
    $location = "../img/employees/";
    /*naming algorithm*/
    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $filename = strtolower($_POST["name"]);
    $filename = str_replace(" ", "_", $filename);
    $filename = $filename . "_" . date("Y-m-d-H-i-s") . "." . $ext;
    /*naming algorithm*/
    move_uploaded_file($tmp, $location . $filename);
    /* END OF FILe UPLOAD*/

    $sql = "INSERT INTO employees (image, name, phone, birth_date, department_id, city_id) VALUES ('$filename','$employeeName', '$employeePhone', '$employeeBirthDate', $employeeDepartmentId, $employeeCityId)";
} else {
    $sql = "INSERT INTO employees (name, phone, birth_date, department_id, city_id) VALUES ('$employeeName', '$employeePhone', '$employeeBirthDate', $employeeDepartmentId, $employeeCityId)";
}

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');

mysqli_query($connection, $sql);

header("Location: list.php");

// echo $_FILES["image"]["name"]  . "<br>";
// echo $_FILES["image"]["tmp_name"] . "<br>";
// echo $_FILES["image"]["size"] . "<br>";
// echo $_FILES["image"]["type"] . "<br>";
?>

