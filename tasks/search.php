<?php
if(isset($_GET["term"])){
    $term = $_GET["term"];
    $sql = "SELECT tasks.id, tasks.name AS taskname, tasks.created_date, tasks.due_date,
    employees.name AS empname, categories.name AS categoryname, priorities.name AS priorityname 
    FROM tasks, employees, categories, priorities 
    WHERE tasks.employee_id = employees.id 
    AND tasks.category_id = categories.id 
    AND tasks.priority_id = priorities.id
    AND tasks.name LIKE '%$term%'";
    $connection = mysqli_connect('localhost', 'root', '', 'task_hup');
    $data = mysqli_query($connection, $sql);
} else {
    $sql = "SELECT tasks.id, tasks.name AS taskname, tasks.created_date, tasks.due_date,
    employees.name AS empname, categories.name AS categoryname, priorities.name AS priorityname 
    FROM tasks, employees, categories, priorities 
    WHERE tasks.employee_id = employees.id 
    AND tasks.category_id = categories.id 
    AND tasks.priority_id = priorities.id";
    $connection = mysqli_connect('localhost', 'root', '', 'task_hup');
    $data = mysqli_query($connection, $sql); 
}

// اختصار لجملة الللي فوقif
/*
$sql = "SELECT tasks.id, tasks.name AS taskname, tasks.created_date, tasks.due_date, employees.name AS empname, categories.name AS categoryname, priorities.name AS priorityname FROM tasks, employees, categories, priorities WHERE employees.id = tasks.employee_id AND categories.id = tasks.category_id AND priorities.id = tasks.priority_id";
if(isset($_GET["term"])){
    $term = $_GET["term"];
    $sql .= " AND tasks.name LIKE '%$term%'"; (.=) => يعني اطبع جمبه
}
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$data = mysqli_query($connection, $sql);
*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks List - TaskHub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <?php include '../includes/menubar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-primary my-5">Search Tasks</h1>
        <form action="search.php" method="get" class="row my-4">
            <div class="col-10">
                <input type="text" name="term" id="term" placeholder="Type To Search For Task Name" class="form-control" value="<?php if(isset($_GET["term"])){echo $term;} ?>">
            </div>

            <div class="col-2">    
                <button type="submit" class="btn btn-outline-primary w-100">Search</button>
            </div>

            
        </form>

        <table class="table">
            <tr class="table-dark">
                <th>#</th>
                <th>Task</th>
                <th>Created At</th>
                <th>Created By</th>
                <th>Due Date</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Actions</th>
            </tr>
            
            <?php while($task = mysqli_fetch_assoc($data)) {?>
            <tr>
                <td><?php echo $task["id"]; ?></td>
                <td><?php echo $task["taskname"]; ?></td>
                <td><?php echo $task["created_date"]; ?></td>
                <td><?php echo $task["empname"]; ?></td>
                <td><?php echo $task["due_date"]; ?></td>
                <td><?php echo $task["categoryname"]; ?></td>
                <td><?php echo $task["priorityname"]; ?></td>
                <td>
                    <a href="../tasks/view.php?taskid=<?php echo $task["id"]; ?>" class="btn btn-outline-secondary">View</a> 
                    <a href="../tasks/edit.php?taskid=<?php echo $task["id"]; ?>" class="btn btn-outline-primary">Edit</a> 
                    <a href="../tasks/delete.php?taskid=<?php echo $task["id"]; ?>" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>




    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>