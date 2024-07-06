<?php
$sql = "SELECT * FROM departments";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$departments_list = mysqli_query($connection, $sql);

$sql = "SELECT * FROM cities";
$connection = mysqli_connect('localhost', 'root', '','task_hup');
$cities_list = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New employee - employeeHub</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <?php include '../includes/menubar.php'; ?>
    <div class="container">
        <h1 class="display-1 text-primary my-5">New employee</h1>
        <form action="save.php" method="post" enctype="multipart/form-data" class="row">

            <input type="hidden" name="id" id="id" class="form-control mt-2 mb-3">

            <div class="col-6">
                <label for="image">Employee Picture</label>
                <input type="file" name="image" id="image" class="form-control mt-2 mb-3">
            </div>

            <div class="col-6">
                <label for="name">Employee Name</label>
                <input type="text" name="name" id="name" class="form-control mt-2 mb-3">
            </div>

            <div class="col-6">
                <label for="phone">Employee Phone</label>
                <input type="text" name="phone" id="phone" class="form-control mt-2 mb-3">
            </div>

            <div class="col-6">
                <label for="b_date">Employee Birth Date</label>
                <input type="date" name="b_date" id="b_date" class="form-control mt-2 mb-3">
            </div>

            <div class="col-6">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-select mt-2 mb-3">
                    <?php while($department = mysqli_fetch_assoc($departments_list)) { ?>
                        <option value="<?php echo $department["id"]; ?>"> <?php echo $department["name"]; ?> </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-6">
                <label for="city_id">City</label>
                <select name="city_id" id="city_id" class="form-select mt-2 mb-3">
                    <?php while($city = mysqli_fetch_assoc($cities_list)) { ?>
                        <option value="<?php echo $city["id"]; ?>"> <?php echo $city["name"]; ?> </option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="../employees/list.php" class="btn btn-secondary">back to list</a>
            </div>
        </form>
    </div>




    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>