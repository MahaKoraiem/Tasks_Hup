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
            $user = mysqli_fetch_assoc($data);
            if(password_verify($password, $user["password"])){
                header("Location: ../includes/index.php");
            }else {
                $error = "The Password Is Incorrect";
            }
        }else {
            $error = "This Username is incorrect";
        }
    }
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/app.css">
</head>
<body class="login_body">
    <div class="container">
        <form action="login.php" class="row" method="post">
            <img src="../img/logo.png" style="margin: auto; width: 300px; margin-top: 20px; border-radius: 50%;">
            <h1 class="display-1 text-primary text-center my-5">Login</h1>
            <?php if(isset($error)){  ?>
                <p class="alert alert-danger"><?php echo $error; ?></p>
            <?php } ?>
            <div class="col-12">
                <label for="username" class="display-6 bg-warning p-1 mb-2 rounded-top boder border-dark">Username</label>
                <input type="text" name="username" id="username" class="form-control mt-2 mb-3" >
            </div>

            <div class="col-12">
                <label for="password" class="display-6 bg-warning p-1 mb-2 rounded-top boder border-dark">Password</label>
                <input type="password" name="password" id="password" class="form-control mt-2 mb-3">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <p class="text-center">Don't have an account? <a href="../auth/register.php">sign up</a></p>
        </form>
    </div>


    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>