<?php
session_start();
include "db.php";

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}


// Category Counts

$teacher = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM complaints WHERE category='Teacher Issue'"))['total'];

$fee = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM complaints WHERE category='Fee Issue'"))['total'];

$transport = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM complaints WHERE category='Transport Issue'"))['total'];

$hostel = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as total FROM complaints WHERE category='Hostel Issue'"))['total'];

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Category Report</title>


<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<link rel="stylesheet" href="dashboard.css">


<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>


<body class="dashboard-page">



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
<a href="status.php">
<i class="fa fa-spinner"></i> Status
</a>
</li>


<li>
<a href="category-report.php">
<i class="fa fa-chart-pie"></i> Category
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





<div class="main">


<h1>Complaint Category Report</h1>


<p>
Welcome,
<?php echo $_SESSION['user']; ?>
</p>




<div class="cards">


<div class="card">
<h3>Teacher Issue</h3>
<p><?php echo $teacher; ?></p>
</div>


<div class="card">
<h3>Fee Issue</h3>
<p><?php echo $fee; ?></p>
</div>


<div class="card">
<h3>Transport Issue</h3>
<p><?php echo $transport; ?></p>
</div>


<div class="card">
<h3>Hostel Issue</h3>
<p><?php echo $hostel; ?></p>
</div>


</div>





<h2 style="margin-top:40px;">
Complaint Analysis
</h2>



<div style="width:400px;">


<canvas id="myChart"></canvas>


</div>





<script>


const ctx = document.getElementById('myChart');


new Chart(ctx, {


type: 'pie',


data: {


labels: [

'Teacher Issue',

'Fee Issue',

'Transport Issue',

'Hostel Issue'

],



datasets: [{

label:'Complaints',


data:[


<?php echo $teacher; ?>,

<?php echo $fee; ?>,

<?php echo $transport; ?>,

<?php echo $hostel; ?>


]


}]


},


options:{


responsive:true


}


});



</script>




</div>


</body>


</html>