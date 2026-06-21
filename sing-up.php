<?php
include "db.php";

$message = "";

if(isset($_POST['signup'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if($password != $confirm){
        $message = "Passwords do not match ❌";
    }
    else{

        $query = "INSERT INTO users (username, email, password)
                  VALUES ('$name', '$email', '$password')";

        if(mysqli_query($conn, $query)){
            $message = "Account Created Successfully 🎉";
        } else {
            $message = "Error creating account ❌";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <title>UNI Track Hub - Register</title>

    <link rel="stylesheet" href="log-in.css">

</head>

<body class="signup-page">

<div class="container">

    <div class="left-side">

        <h1>UNI Track Hub</h1>

        <p>
            Create your account and submit complaints easily.
        </p>

    </div>

    <div class="right-side">

        <form method="POST">

            <h2>Register</h2>

            <p class="text">Create your new account 👇</p>

            <div class="input-box">
                <input type="text" name="name" placeholder="Enter Your Name" required>
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Enter Your Email" required>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Create Password" required>
            </div>

            <div class="input-box">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <button type="submit" name="signup">Register</button>

            <p style="color:green;">
                <?php echo $message; ?>
            </p>

            <div class="bottom-text">
                Already have an account?
                <a href="log-in.php">Login</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>