<?php
$sql = "SELECT tasks.id AS taskid, tasks.name AS taskname, employees.id AS empid, employees.name AS empname, employees.image, employee_task.id AS emptaskid 
FROM tasks, employees, employee_task 
WHERE tasks.id = employee_task.task_id 
AND employees.id = employee_task.employee_id";


if(isset($_GET["term"])){
    $term = $_GET["term"];
    $sql .= " AND tasks.name LIKE '%$term%'";
}

$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$emp_task_list = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <?php include '../includes/menubar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-primary my-5">Employees List</h1>
        <form action="../employee_task/list.php" method="get" class="row my-4">
            <div class="col-10">
                <input type="text" name="term" id="term" placeholder="Type a name to search for" class="form-control"
                value="<?php if(isset($_GET["term"])) {echo $term;}  ?>">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-outline-primary w-100">Search</button>
            </div>
        </form>
        <div class="table-response">
            <table class="table">
                <tr class="table-dark">
                    <th>#</th>
                    <th>task name</th>
                    <th>Created By</th>
                    <th>Assigned to</th>
                    <th>image</th>
                    <th>Actions</th>
                </tr>
    
                <?php while($employee_task = mysqli_fetch_assoc($emp_task_list)) { ?>
                    <tr>
                        <td><?php echo $employee_task["emptaskid"]; ?></td>
                        <td><?php echo $employee_task["taskname"]; ?></td>
                        <td><?php echo $employee_task["empname"]; ?></td>
                        <td><?php echo $employee_task["empname"]; ?></td>
                        <td>
                            <img src="../img/employees/<?php echo $employee_task["image"]; ?>" style="width: 50px; border-radius: 50%;">
                        </td>

                        <td>
                            <a href="../employee_task/view.php?empid=<?php echo $employee_task["empid"]; ?>s" class="btn btn-outline-secondary">View</a>
                            <a href="../employee_task/edit.php?empid=<?php echo $employee_task["empid"]; ?>" class="btn btn-outline-primary">Edit</a>
                            <a href="../employee_task/delete.php?empid=<?php echo $employee_task["empid"]; ?>" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>  
            </table>
        </div>
    </div>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>