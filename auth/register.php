<?php
if(isset($_POST["username"])){
    if($_POST["username"] == "" || $_POST["password"] == ""){
        $error = "You Must Enter A Value";
    }else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $connection = mysqli_connect('localhost', 'root', '','task_hup');
        //check if the username is taken
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $data = mysqli_query($connection, $sql);
        if(mysqli_num_rows($data) > 0){
            $error = "This Username is already taken";
        }else {
            $hased_pass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hased_pass')";
            $connection = mysqli_connect('localhost', 'root', '','task_hup');
            mysqli_query($connection, $sql);
            header("Location: login.php");
        }
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body class="register_body">
    <div class="container">
        <form action="register.php" class="row" method="post">
            <img src="../img/logo2.png" style="margin: auto; width: 30%; margin-top: 20px; border-radius: 50%; border: 20px solid orange; box-shadow: 10px 10px 10px grey;">
            <h1 class="display-1 text-primary text-center my-5">Create An Account</h1>
            <?php if(isset($error)){  ?>
                <p class="alert alert-danger"><?php echo $error; ?></p>
            <?php } ?>
            <div class="col-12">
                <label for="username" class="display-6 bg-light p-1 mb-2 rounded-top boder border-dark">Username</label>
                <input type="text" name="username" id="username" class="form-control mt-2 mb-3">
            </div>

            <div class="col-12">
                <label for="password" class="display-6 bg-light p-1 mb-2 rounded-top">Password</label>
                <input type="password" name="password" id="password" class="form-control mt-2 mb-3">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary">Craete An Acconut</button>
            </div>
            <p class="text-center">already have an account? <a href="../auth/login.php">sign in</a></p>
        </form>
    </div>


    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>