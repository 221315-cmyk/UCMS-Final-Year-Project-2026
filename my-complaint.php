<?php
session_start();
include "db.php";


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM complaints ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>My Complaint</title>

  <link rel="stylesheet" href="my-complaint.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

  <div class="sidebar">

    <h2>UNI TRACK HUB</h2>

    <ul>

        <li><a href="dashboard.php"><i class="fa fa-gauge"></i> Dashboard</a></li>

        <li><a href="newcomplaint.php"><i class="fa fa-plus"></i> New Complaint</a></li>

        <li><a href="my-complaint.php"><i class="fa fa-list"></i> My Complaint</a></li>
        <li><a href="category-report.php"><i class="fa fa-chart-pie"></i> Category</a></li>

        <li><a href="status.php"><i class="fa fa-spinner"></i> Status</a></li>

        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>

        <li><a href="log-out.php"><i class="fa fa-right-from-bracket"></i> Logout</a></li>

    </ul>

</div>

  <div class="main-content">

    <h1>My Complaints 📋</h1>

    <table border="1" cellpadding="10" cellspacing="0">

      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Category</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>

      <?php while($row = mysqli_fetch_assoc($result)) { ?>

      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['details']; ?></td>

      
        <td>
            <?php echo $row['status']; ?>
        </td>

      
        <td>
            <?php if($row['status'] != 'Resolved') { ?>
                <a href="update-status.php?id=<?php echo $row['id']; ?>"
                   style="background:green;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;">
                    Mark as Resolved
                </a>
            <?php } else { ?>
                <span style="color:green;font-weight:bold;">✔ Resolved</span>
            <?php } ?>
        </td>

      </tr>

      <?php } ?>

    </table>

  </div>

</body>
</html>