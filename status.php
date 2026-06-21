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

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="status.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<title>Complaint Status</title>



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


<h1>Complaint Status 📊</h1>


<?php while($row = mysqli_fetch_assoc($result)) { ?>


<div class="status-box">


<h3>Complaint ID: <?php echo $row['id']; ?></h3>


<p>
<strong>Category:</strong>
<?php echo $row['category']; ?>
</p>


<p>
<strong>Description:</strong>
<?php echo $row['details']; ?>
</p>



<!-- <p>

<strong>Status:</strong>


<?php if($row['status']=="Solved"){ ?>

<span class="solved">
Solved
</span>

<?php } else { ?>

 <span class="pendin">
Pending
</span>

<?php } ?>  


</p> -->


</div>


<?php } ?>


</div>


</body>
</html>