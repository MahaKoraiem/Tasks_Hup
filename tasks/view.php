<?php
$id = $_GET["taskid"];

$sql = "SELECT * FROM tasks WHERE id = $id";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$data = mysqli_query($connection, $sql);
//$task = mysqli_fetch_row($data); zero indexed array
$task = mysqli_fetch_assoc($data); //associative array

/* Getting Task Statuses */
$sql = "SELECT statuses.name AS statusname, status_task.date, employees.name AS employeename FROM status_task, statuses, employees WHERE employees.id = status_task.employee_id AND statuses.id = status_task.status_id AND status_task.task_id = $id";
$statuses_list = mysqli_query($connection, $sql);
/* Getting Task Statuses */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task Details - TaskHub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <div class="container">
        <h1 class="display-1 text-primary my-5">View Task Details</h1>
        <ul>
            <li>Task :          <?php echo $task["name"];          ?>   </li>
            <li>Description :   <?php echo $task["description"];   ?>   </li>
            <li>Due Date :      <?php echo $task["due_date"];      ?>   </li>
            <li>Category :      <?php echo $task["category_id"];   ?>   </li>
            <li>Employee :      <?php echo $task["employee_id"];   ?>   </li>
            <li>Priority :      <?php echo $task["priority_id"];   ?>   </li>
            <li>Created at :    <?php echo $task["created_date"];  ?>   </li>
        </ul>

        <h2>Status Update</h2>
        <table class="table">
            <tr>
                <td>Status</td>
                <td>Date</td>
                <td>Updated By</td>
            </tr>

            <?php while($task_status = mysqli_fetch_assoc($statuses_list)){ ?>
            <tr>
                <td><?php echo $task_status["statusname"]; ?></td>
                <td><?php echo $task_status["date"]; ?></td>
                <td><?php echo $task_status["employeename"]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>




    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>