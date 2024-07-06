<?php
$sql = "SELECT employees.id,employees.image, employees.name AS empname, employees.phone, employees.birth_date,
departments.name AS departname, cities.name AS cityname
FROM employees, departments, cities 
WHERE departments.id = employees.department_id 
AND cities.id = employees.city_id";

if(isset($_GET["term"])){
    $term = $_GET["term"];
    $sql .= " AND employees.name LIKE '%$term%'";
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
        <h1 class="display-1 text-primary my-5">Employees List</h1>
        <form action="../employees/list.php" method="get" class="row my-4">
            <div class="col-10">
                <input type="text" name="term" id="term" placeholder="Type a name to search for" class="form-control"
                value="<?php if(isset($_GET["term"])) {echo $term;}  ?>">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-outline-primary w-100">Search</button>
            </div>
        </form>
        <div class="table-response">
            <table class="table">
                <tr class="table-dark">
                    <th>#</th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Birth Date</th>
                    <th>Department</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
    
                <?php while($employee = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <td><?php echo $employee["id"]; ?></td>
                        <td>
                            <img src="../img/employees/<?php echo $employee["image"]; ?>" style="width: 50px; border-radius: 50%;">
                        </td>
                        <td><?php echo $employee["empname"]; ?></td>
                        <td><?php echo $employee["phone"]; ?></td>
                        <td><?php echo $employee["birth_date"]; ?></td>
                        <td><?php echo $employee["departname"]; ?></td>
                        <td><?php echo $employee["cityname"]; ?></td>
    
    
                        <td>
                            <a href="../employees/view.php?empid=<?php echo $employee["id"]; ?>" class="btn btn-outline-secondary">View</a>
                            <a href="../employees/edit.php?empid=<?php echo $employee["id"]; ?>" class="btn btn-outline-primary">Edit</a>
                            <a href="../employees/delete.php?empid=<?php echo $employee["id"]; ?>" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>  
            </table>
        </div>
    </div>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>