<?php
$departmentId = $_GET["departid"];
$sql = "SELECT * FROM departments WHERE id = $departmentId";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$data = mysqli_query($connection, $sql);
$department = mysqli_fetch_assoc($data);

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
        <h1 class="display-1 text-primary my-5">View City Details</h1>
        <ul>
          <li>Department Id :          <?php echo $department["id"];    ?>   </li>
          <li>Department Name :        <?php echo $department["name"];  ?>   </li>
        </ul>
    </div>




    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>