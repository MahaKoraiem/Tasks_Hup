<?php
$name = $_POST["name"];
$desc = $_POST["task_description"];
$due = $_POST["due_date"];
$emp = $_POST["employee_id"];
$cat = $_POST["category_id"];
$priority = $_POST["priority_id"];

$sql = "INSERT INTO tasks (name, due_date, description, priority_id, category_id, employee_id) VALUES ('$name', '$due', '$desc', $priority, $cat, $emp)";

// mysqli_connect('server_name', 'user_name', 'password','database_name');
$connection = mysqli_connect('localhost', 'root', '','task_hup');

// mysqli_query(mysqli_connect('localhost', 'root', '','task_hub'), "INSERT INTO tasks (name, due_date, description, priority_id, category_id, employee_id) VALUES ('new task', '2024-4-27', 'This is the description for the new task', 2, 1, 2)");

// mysqli_query('database_coneection', "sql_statement");
mysqli_query($connection, $sql);

/* Getting the id of the newly added task */
$sql = "SELECT id FROM tasks ORDER BY id desc LIMIT 1";
$new_task_list = mysqli_query($connection, $sql);
$new_task = mysqli_fetch_assoc($new_task_list);
$new_task_id = $new_task["id"];
/* Getting the id of the newly added task */


/* Attach a To Do status to the Task */
$sql = "INSERT INTO status_task (task_id, status_id, employee_id) VALUES ($new_task_id, 1, $emp)";
mysqli_query($connection, $sql);
/* Attach a To Do status to the Task */



header("Location: list.php");
?>