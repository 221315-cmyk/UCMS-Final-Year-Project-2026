<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <title>Logout</title>

  <link rel="stylesheet" href="log-out.css">
</head>

<body>

  <div class="logout-box">

    <h1>Logging Out...</h1>

    <p>You have been successfully logged out.</p>

    <a href="log-in.php">Go to Login</a>

  </div>

</body>

</html>