<?php
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
if(isset($_POST["status_id"])){
    $s_id = $_POST["status_id"];
    $t_id = $_POST["task_id"];
    $sql = "INSERT INTO status_task (task_id, status_id, employee_id) VALUES ($t_id, $s_id, 1)";
    mysqli_query($connection, $sql);
    header("Location: list.php"); 
}
$sql = "SELECT tasks.id, tasks.name AS taskname, tasks.created_date, tasks.due_date, employees.name AS empname, categories.name AS categoryname, priorities.name AS priorityname, priorities.color FROM tasks, employees, categories, priorities WHERE employees.id = tasks.employee_id AND categories.id = tasks.category_id AND priorities.id = tasks.priority_id";
$data = mysqli_query($connection, $sql);
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
        <h1 class="display-1 text-primary my-5">Tasks List</h1>
        <table class="table">
            <tr class="table-dark">
                <th>#</th>
                <th>Task</th>
                <th>Created At</th>
                <th>Created By</th>
                <th>Due Date</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Status</th>
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
                <td>
                    <span class="edit-priority badge" style="background-color: <?php echo $task["color"]; ?>">
                        <?php echo $task["priorityname"]; ?>
                    </span>
                </td>

                <td>
                    <?php
                        $task_id = $task["id"];
                        $sql = "SELECT statuses.name FROM statuses, status_task WHERE statuses.id = status_task.status_id AND status_task.task_id = $task_id ORDER BY status_task.date desc LIMIT 1";
                        $status_list = mysqli_query($connection, $sql);
                        $task_status = mysqli_fetch_assoc($status_list);
                        $status_name = $task_status["name"];
                    ?>
                    
                    <span data-bs-toggle="modal" data-bs-target="#task_<?php echo $task["id"]; ?>" class="edit-status badge
                    <?php
                        if($status_name == "To Do"){
                            echo "bg-danger";
                        }elseif ($status_name == "In Progress"){
                            echo "bg-warning";
                        }elseif ($status_name == "Done"){
                            echo "bg-success";
                        }elseif ($status_name == "Postponed"){
                            echo "bg-secondary";
                        }
                    ?>
                    ">
                    <?php echo $status_name; ?>
                    </span>

                    <!-- Modal -->
                    <div class="modal fade" id="task_<?php echo $task["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="list.php">
                                    <div class="modal-body">
                                        <?php
                                        $sql = "SELECT * FROM statuses";
                                        $status_list = mysqli_query($connection, $sql);
                                        ?>
                                        <select name="status_id" id="status_id" class="form-select">
                                            <?php while($status = mysqli_fetch_assoc($status_list)) { ?>
                                                <option value="<?php echo $status["id"]; ?>">
                                                    <?php echo $status["name"]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                        <input type="hidden" name="task_id" id="task_id" value="<?php echo $task["id"]; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>    
                        </div>
                    </div>
                </td>
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