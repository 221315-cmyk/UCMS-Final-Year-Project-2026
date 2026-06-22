<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$total = 0;
$pending = 0;
$resolved = 0;

$totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM complaints");
if($totalQuery){
    $total = mysqli_fetch_assoc($totalQuery)['total'];
}

$pendingQuery = mysqli_query($conn, "SELECT COUNT(*) as pending FROM complaints WHERE status='Pending'");
if($pendingQuery){
    $pending = mysqli_fetch_assoc($pendingQuery)['pending'];
}

$resolvedQuery = mysqli_query($conn, "SELECT COUNT(*) as resolved FROM complaints WHERE status='Resolved'");
if($resolvedQuery){
    $resolved = mysqli_fetch_assoc($resolvedQuery)['resolved'];
}

$recentQuery = mysqli_query($conn, "SELECT * FROM complaints ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<title>UNI Track Hub - Dashboard</title>

<link rel="stylesheet" href="dashboard.css">
```

</head>
s
<body class="dashboard-page">

<div class="sidebar">

```
<h2>UNI TRACK HUB</h2>

<ul>

    <li><a href="dashboard.php"><i class="fa fa-gauge"></i> Dashboard</a></li>

    <li><a href="newcomplaint.php"><i class="fa fa-plus"></i> New Complaint</a></li>

    <li><a href="my-complaint.php"><i class="fa fa-list"></i> My Complaint</a></li>

    <li><a href="status.php"><i class="fa fa-spinner"></i> Status</a></li>
    <li><a href="category-report.php"><i class="fa fa-chart-pie"></i> Category</a></li>

    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>

    <li><a href="log-out.php"><i class="fa fa-right-from-bracket"></i> Logout</a></li>

</ul>
```

</div>

<div class="main">

```
<h1>Dashboard</h1>

<p>
    Welcome,
    <?php echo $_SESSION['user']; ?>
</p>

<div class="cards">

    <div class="card">
        <h3>Total Complaints</h3>
        <p><?php echo $total; ?></p>
    </div>

    <div class="card">
        <h3>Pending</h3>
        <p><?php echo $pending; ?></p>
    </div>

    <div class="card">
        <h3>Resolved</h3>
        <p><?php echo $resolved; ?></p>
    </div>

</div>

<h2 style="margin-top:40px;">Recent Complaints</h2>

<table border="1" width="100%" cellpadding="10" cellspacing="0">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Status</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($recentQuery)){ ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>

    <?php } ?>

</table>
```

</div>

</body>
</html>
