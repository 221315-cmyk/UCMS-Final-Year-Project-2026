<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user'];


// Complaint Statistics

$total = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(*) as total FROM complaints")
)['total'];


$pending = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(*) as total FROM complaints WHERE status='Pending'")
)['total'];


$resolved = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(*) as total FROM complaints WHERE status='Resolved'")
)['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="style.css">

<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<title>Profile</title>


<link rel="stylesheet" href="profile.css">


</head>


<body>



<div class="sidebar">


<h2>UNI TRACK HUB</h2>


<ul>


<li>
<a href="dashboard.php">
<i class="fa fa-gauge"></i> Dashboard
</a>
</li>


<li>
<a href="newcomplaint.php">
<i class="fa fa-plus"></i> New Complaint
</a>
</li>


<li>
<a href="my-complaint.php">
<i class="fa fa-list"></i> My Complaint
</a>
</li>


<li>
<a href="category-report.php">
<i class="fa fa-chart-pie"></i> Category
</a>
</li>


<li>
<a href="status.php">
<i class="fa fa-spinner"></i> Status
</a>
</li>


<li>
<a href="profile.php">
<i class="fa fa-user"></i> Profile
</a>
</li>


<li>
<a href="log-out.php">
<i class="fa fa-right-from-bracket"></i> Logout
</a>
</li>


</ul>


</div>




<div class="main-content">



<h1>Profile 👤</h1>




<div class="profile-card">



<div class="profile-image">

<img src="imge/tayyab pic.jpeg" alt="Profile">

</div>




<div class="profile-info">


<h2>User Profile</h2>


<p>
<strong>Email:</strong>
<?php echo $email; ?>
</p>


<p>
<strong>Department:</strong>
BSCS
</p>


<p>
<strong>Semester:</strong>
8th
</p>


<p>
<strong>Phone:</strong>
0300-1234567
</p>



<h3 class="role-box">
🎓 Student Role
</h3>



</div>


</div>





<!-- Statistics -->


<div class="cards">



<div class="card">

<h3>Total Complaints</h3>

<p>
<?php echo $total; ?>
</p>

</div>




<div class="card">

<h3>Pending</h3>

<p>
<?php echo $pending; ?>
</p>

</div>





<div class="card">

<h3>Resolved</h3>

<p>
<?php echo $resolved; ?>
</p>

</div>



</div>





</div>



</body>

</html>