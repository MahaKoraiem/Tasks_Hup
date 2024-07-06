<?php
$sql = "SELECT * FROM categories";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$categories_list = mysqli_query($connection, $sql);

$sql = "SELECT * FROM priorities";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$priorities_list = mysqli_query($connection, $sql);

$sql = "SELECT * FROM employees";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$employees_list = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task - TaskHub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <?php include '../includes/menubar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-primary my-5">New Task</h1>
        <form action="save.php" method="post" class="row">
            <div class="col-6">
                <label for="name">Task Title</label>
                <input type="text" name="name" id="name" class="form-control mt-2 mb-3">
            </div>
            <div class="col-6">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-select mt-2 mb-3">
                    <?php while($category = mysqli_fetch_assoc($categories_list)) {?>
                        <option value="<?php echo $category["id"]; ?>"> <?php echo $category["name"]; ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12">
                <label for="task_description">Task Description</label>
                <input type="text" name="task_description" id="task_description" class="form-control mt-2 mb-3">
            </div>
            <div class="col-6">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control mt-2 mb-3">
            </div>
            <div class="col-6">
                <label for="due_date">employee name</label>
                <select name="employee_id" id="employee_id" class="form-select mt-2 mb-3">
                    <?php while($employee = mysqli_fetch_assoc($employees_list)) { ?>
                        <option value="<?php echo $employee["id"]; ?>"> <?php echo $employee["name"]; ?> </option>
                    <?php } ?> 
                </select>
            </div>
            <div class="col-6">
                <label for="priority_id">priority</label>
                <select name="priority_id" id="priority_id" class="form-select mt-2 mb-3">
                    <?php while($priority = mysqli_fetch_assoc($priorities_list)) { ?>
                        <option value="<?php echo $priority["id"]; ?>"> <?php echo $priority["name"]; ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="../tasks/list.php" class="btn btn-secondary">back to list</a>
            </div>
        </form>
    </div>




    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>