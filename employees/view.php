<?php
$employeeId = $_GET["empid"];
$sql = "SELECT * FROM employees WHERE id = $employeeId";
$connection = mysqli_connect('localhost', 'root', '', 'task_hup');
$data = mysqli_query($connection, $sql);
$employee = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View employee Details - Task Hub</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/app.css">
</head>
<body>
  <?php include '../includes/menubar.php'; ?>
  <div class="container">
    <h1 class="display-1 text-primary my-5">View employee Details</h1>
    <div class="row">
      <div class="col-10">
        <ul>
          <li>employee Id :          <?php echo $employee["id"];        ?>   </li>
          <li>employee Name :        <?php echo $employee["name"];       ?>   </li>
          <li>employee phone :        <?php echo $employee["phone"];      ?>   </li>
          <li>employee birth date :    <?php echo $employee["birth_date"];  ?>  </li>
          <li>employee department id :  <?php echo $employee["department_id"]; ?> </li>
          <li>employee city id :        <?php echo $employee["city_id"];        ?>   </li>
        </ul>
      </div>

      <div class="col-2">
        <img class="img-fluid rounded" src="../img/employees/<?php echo $employee["image"]; ?>">
      </div>
    </div>  
  </div>




  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/app.js"></script>
</body>
</html>