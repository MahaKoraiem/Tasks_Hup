<?php
$id = $_GET["catid"];
$sql = "SELECT * FROM categories WHERE id= $id";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$data = mysqli_query($connection, $sql);
$category = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category - TaskHub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
  <?php include '../includes/menubar.php'; ?>
  <div class="container">
      <h1 class="display-1 text-primary my-5">Add New Category</h1>
      <form action="update.php" method="post" class="row">

        <input type="hidden" name="id" id="id" class="form-control mt-2 mb-3" value="<?php echo $category["id"]; ?>">

        <div class="col-6">
          <label for="name">Category Name</label>
          <input type="text" name="name" id="name" class="form-control mt-2 mb-3" value="<?php echo $category["name"]; ?>">
        </div>

        <div class="col-2">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="../categories/list.php" class="btn btn-secondary">back to list</a>
        </div>

      </form>
  </div>




    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>