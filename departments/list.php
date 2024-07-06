<?php
$sql = "SELECT * FROM departments";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$data = mysqli_query($connection, $sql);

if(isset($_GET["term"])){
    $term = $_GET["term"];
    $sql .= " WHERE departments.name LIKE '%$term%'";
}
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$data = mysqli_query($connection, $sql);
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
        <h1 class="display-1 text-primary my-5">Departments List</h1>

        <form action="../departments/list.php" method="get" class="row my-4">
            <div class="col-10">
                <input type="text" name="term" id="term" placeholder="Type a department name" class="form-control"
                value="<?php if(isset($_GET["term"])){echo $term;} ?>">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-outline-primary w-100">Search</button>
            </div>
        </form>
        <table class="table">
            <tr class="table-dark">
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            
            <?php while($department = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $department["id"]; ?></td>
                <td><?php echo $department["name"]; ?></td>
                <td>
                    <a href="../departments/view.php?departid=<?php echo $department["id"]; ?>" class="btn btn-outline-secondary">view</a>
                    <a href="../departments/edit.php?departid=<?php echo $department["id"]; ?>" class="btn btn-outline-primary">Edit</a>
                    <a href="../departments/delete.php?departid=<?php echo $department["id"]; ?>" class="btn btn-outline-danger">Delete</a>
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