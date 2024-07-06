<?php
$id = $_GET["priid"];
$sql = "SELECT * FROM priorities WHERE id= $id";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$data = mysqli_query($connection, $sql);
$priority = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Priority - TaskHub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <?php include '../includes/menubar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-primary my-5">Edit Priority</h1>
        <form action="update.php" method="post" class="row">
          
          <div class="col-10">
            <label for="name">Priority Name</label>
            <input type="text" name="name" id="name" class="form-control mt-2 mb-3" value="<?php echo $priority["name"]; ?>">
          </div>

          <div class="col-2">
            <label for="name">Priority Color</label>
            <input type="color" name="color" id="color" class="form-control form-control-color mt-2 mb-3" value="<?php echo $priority["color"]; ?>">
          </div>

          <input type="hidden" name="id" id="id" class="form-control mt-2 mb-3" value="<?php echo $priority["id"]; ?>">

          <div class="col-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="../priorities/list.php" class="btn btn-secondary">back to list</a>
          </div>
        </form>
    </div>




    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>