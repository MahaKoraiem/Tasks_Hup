<?php
$id = $_GET["empid"];
$sql = "SELECT * FROM employees WHERE id= $id";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$data = mysqli_query($connection, $sql);
$employee = mysqli_fetch_assoc($data);

$sql = "SELECT * FROM departments";
$departments_list = mysqli_query($connection, $sql);

$sql = "SELECT * FROM cities";
$cities_list = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit employee - Task Hub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <?php include '../includes/menubar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-primary my-5">Edit employee</h1>
        <form action="update.php" method="post" class="row" enctype="multipart/form-data">
            
            <input type="hidden" name="emp_id" id="id" class="form-control mt-2 mb-3">

            <div class="col-10">
                <img src="../img/employees/<?php echo $employee["image"]; ?>" class="img-fluid rounded" style="width: 300px; border-radius: 50%;">
            </div>

            <div class="col-6">
                <input type="file" name="image" id="image" class="form-control mt-2 mb-3">
            </div>
            <div class="col-6">
                <label for="name">Employee Name</label>
                <input type="text" name="name" id="name" class="form-control mt-2 mb-3" value="<?php echo $employee["name"]; ?>">
            </div>

            <div class="col-6">
                <label for="phone">Employee Phone</label>
                <input type="text" name="phone" id="phone" class="form-control mt-2 mb-3" value="<?php echo $employee["phone"]; ?>">
            </div>

            <div class="col-6">
                <label for="b_date">Employee Birth Date</label>
                <input type="date" name="b_date" id="b_date" class="form-control mt-2 mb-3" value="<?php echo $employee["birth_date"]; ?>">
            </div>

            <div class="col-6">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-select mt-2 mb-3">
                    <?php while($department = mysqli_fetch_assoc($departments_list)) { ?>
                        <option <?php if($department["id"] == $employee["department_id"]) {echo "selected";} ?> value="<?php echo $department["id"]; ?>"><?php echo $department["name"]; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-6">
                <label for="city_id">City</label>
                <select name="city_id" id="city_id" class="form-select mt-2 mb-3">
                    <?php while($city = mysqli_fetch_assoc($cities_list)) { ?>
                        <option <?php if($city["id"] == $employee["city_id"]) {echo "selected";} ?> value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
                    <?php } ?>
                </select>
            </div>
                    
  
                    
            <div class="col-10">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="../employees/list.php" class="btn btn-secondary">back to list</a>
            </div>
        </form>
            
            
            

    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>