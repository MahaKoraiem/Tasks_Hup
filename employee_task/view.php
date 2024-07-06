<?php
$employeeId = $_GET["empid"];
//$id = $_GET["taskid"];
$sql = "SELECT * FROM employees WHERE id = $employeeId";
// $sql = "SELECT tasks.id, tasks.name AS taskname, tasks.description, tasks.created_date, tasks.due_date, categories.name AS catname, priorities.name AS priname, statuses.name AS statname, employees.name AS empname, employees.image, employees.phone, employees.birth_date, departments.name AS depname, cities.name AS cityname, status_task.date, priorities.color FROM tasks, employees, employee_task, categories, priorities, statuses, departments, cities, status_task WHERE tasks.employee_id = employees.id AND tasks.category_id = categories.id AND tasks.priority_id = priorities.id AND employees.department_id = departments.id AND employees.city_id = cities.id AND statuses.id = status_task.status_id AND tasks.priority_id = priorities.id";
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
      <div class="container">
        <h3 class="display-5 text-primary my-5">Task Was Assigned To :</h3>
        <table class="table">
          <tr class="table-dark">
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Phone</th>
            <th>Birth Date</th>
            <th>Department</th>
            <th>City</th>
          </tr>

          <tr>
            <td>1</td>
            <td><?php echo $employee["name"]; ?></td>
            <td><img src="../img/employees/<?php echo $employee["image"]; ?>" style="width: 50px; border-radius: 50%;"></td>
            <td><?php echo $employee["phone"]; ?></td>
            <td><?php echo $employee["birth_date"]; ?></td>
            <td><?php echo $employee["department_id"]; ?></td>
            <td><?php echo $employee["city_id"]; ?></td>
          </tr>
        </table>

        <h3 class="display-5 text-primary my-5">Assigned Task Details :</h3>
        <table class="table">
          <tr class="table-dark">
            <th>#</th>
            <th>Task Name</th>
            <th>Desc</th>
            <th>Created Date</th>
            <th>Due Date</th>
            <th>Category</th>
            <th>Priority</th>
            <th>Status</th>
            <th>date</th>
          </tr>

          <tr>
            <td></td>
            <td><?php echo $employee["taskname"]; ?></td>
            <td><?php echo $employee["description"]; ?></td>
            <td><?php echo $employee["created_date"]; ?></td>
            <td><?php echo $employee["due_date"]; ?></td>
            <td><?php echo $employee["catname"]; ?></td>
            <td><?php echo $employee["priname"]; ?></td>
            <td><?php echo $employee["statname"]; ?></td>
            <td><?php echo $employee["date"]; ?></td>
          </tr>
        </table>

        <h3 class="display-5 text-primary my-5">Task Was Updated By :</h3>
        <table class="table">
          <tr class="table-dark">
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Phone</th>
            <th>Birth Date</th>
            <th>Department</th>
            <th>City</th>
          </tr>

          <tr>
            <td>1</td>
            <td><?php echo $employee["empname"]; ?></td>
            <td><img src="../img/employees/<?php echo $employee["image"]; ?>" style="width: 50px; border-radius: 50%;"></td>
            <td><?php echo $employee["phone"]; ?></td>
            <td><?php echo $employee["birth_date"]; ?></td>
            <td><?php echo $employee["depname"]; ?></td>
            <td><?php echo $employee["cityname"]; ?></td>
          </tr>
        </table>
      </div>


    </div>  
  </div>




  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/app.js"></script>
</body>
</html>