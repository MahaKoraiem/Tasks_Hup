<?php
$id = $_GET["taskid"];
$sql = "SELECT * FROM tasks WHERE id= $id";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$data = mysqli_query($connection, $sql);
$task = mysqli_fetch_assoc($data);

$sql = "SELECT * FROM categories";
$categories_list = mysqli_query($connection, $sql);

$sql = "SELECT * FROM priorities";
$priorities_list = mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - TaskHub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <?php include '../includes/menubar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-primary my-5">Edit Task</h1>
        <form action="update.php" method="post" class="row">

            <div class="col-6">
                <label for="name">Task Title</label>
                <input type="text" name="name" id="name" class="form-control mt-2 mb-3" value="<?php echo $task["name"] ?>">
            </div>

            <div class="col-6">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-select mt-2 mb-3">
                    <?php while($category = mysqli_fetch_assoc($categories_list)) { ?>
                        <option <?php if($category["id"] == $task["category_id"]){echo "selected";} ?> value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
                    <?php } ?>    
                </select>
            </div>
            
            <div class="col-12">
                <label for="task_description">Task Describtion</label>
                <input type="text" name="task_description" id="task_description" class="form-control mt-2 mb-3" value="<?php echo $task["description"] ?>">
            </div>

            <div class="col-6">
                <label for="due_date">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="form-control mt-2 mb-3" value="<?php echo $task["due_date"] ?>">
            </div>
            
            <div class="col-6">
                <label for="priority_id">priority</label>
                <select name="priority_id" id="priority_id" class="form-select mt-2 mb-3">
                        <?php while($priority = mysqli_fetch_assoc($priorities_list)) { ?>
                            <option <?php if($priority["id"] == $task["priority_id"]){echo "selected";} ?> value="<?php echo $priority["id"]; ?>"><?php echo $priority["name"]; ?></option>
                        <?php } ?>
                </select>
            </div>

            <input type="hidden" name="task_id" id="task_id" class="form-control mt-2 mb-3" value="<?php echo $task["id"] ?>">
            
            <div class="col-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="../tasks/list.php" class="btn btn-secondary">back to list</a>
            </div>
        </form>
    </div>

    


    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>