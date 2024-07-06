<?php
$statusId = $_GET["statusid"];
$sql = "SELECT * FROM statuses WHERE id = $statusId";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$data = mysqli_query($connection, $sql);
$status = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View status Details - Task Hub</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/app.css">
</head>
<body>
  <?php include '../includes/menubar.php'; ?>
  <div class="container">
    <h1 class="display-1 text-primary my-5">View status Details</h1>
    <ul>
      <li>status Id :          <?php echo $status["id"];          ?>   </li>
      <li>status Name :        <?php echo $status["name"];        ?>   </li>
    </ul>
  </div>




  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/app.js"></script>
</body>
</html>