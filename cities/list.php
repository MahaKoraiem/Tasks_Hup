<?php
$sql = "SELECT * FROM cities";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$data = mysqli_query($connection, $sql);

if(isset($_GET["term"])){
    $term = $_GET["term"];
    $sql .= " WHERE cities.name LIKE '%$term%'";
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
        <h1 class="display-1 text-primary my-5">Cities List</h1>
        <form action="../cities/list.php" method="get" class="row my-4">
            <div class="col-10">
                <input type="text" name="term" id="term" placeholder="Type a city name" class="form-control"
                value="<?php if(isset($_GET["term"])){echo $term;}  ?>">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-outline-primary w-100">Search</button>
            </div>
        </form>
        <table class="table">
            <tr class="table-dark">
                <th>#</th>
                <th>name</th>
                <th>Actions</th>
            </tr>

            <?php while($city = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $city["id"] ?></td>
                <td><?php echo $city["name"] ?></td>

                <td>
                    <a href="../cities/view.php?cityid=<?php echo $city["id"]; ?>" class="btn btn-outline-secondary">view</a>
                    <a href="../cities/edit.php?cityid=<?php echo $city["id"]; ?>" class="btn btn-outline-primary">Edit</a>
                    <a href="../cities/delete.php<?php echo $city["id"]; ?>" class="btn btn-outline-danger">Delete</a>
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