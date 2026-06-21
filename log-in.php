<?php
session_start();
include "db.php";

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users 
              WHERE email='$email' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $_SESSION['user'] = $email;

        header("Location: dashboard.php");
        exit();

    } else {
        $message = "Invalid Email or Password ❌";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="log-in.css">
     <!-- <link rel="stylesheet" href="style.css">  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

<div class="container">

    <div class="left-side">

        <h1>UNI Track Hub</h1>

        <p>
            University Complaint Management System <br>
            Submit and track complaints online easily.
        </p>

    </div>

    <div class="right-side">

        <form method="POST">

            <h2>Login</h2>

            <p class="text">Welcome Back 👋</p>

            <div class="input-box">
                <input type="email" name="email" placeholder="Enter Your Email" required>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>

            <button type="submit" name="login">Login</button>

            <p style="color:red; text-align:center;">
                <?php echo $message; ?>
            </p>

            <div class="bottom-text">
                Don't have an account?
                <a href="sing-up.php">Register</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>