<?php
session_start();
include "db.php";

$message = "";

if(!isset($_SESSION['user'])){
    header("Location: log-in.php");
    exit();
}


if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $details = $_POST['details'];


    $query = "INSERT INTO complaints (name,email,category,details)
              VALUES ('$name','$email','$category','$details')";


    if(mysqli_query($conn,$query)){
        $message="Complaint Submitted Successfully ✔️";
    }
    else{
        $message="Error submitting complaint ❌";
    }

}

?>

<!DOCTYPE html>
<html>

<head>

<title>New Complaint</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="newcomplaint.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>


<body>


<div class="sidebar">

<h2>UNI TRACK HUB</h2>

<ul>

<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="newcomplaint.php">New Complaint</a></li>
<li><a href="my-complaint.php">My Complaint</a></li>
<li><a href="status.php">Status</a></li>

<li>
<a href="category-report.php">
Category
</a>
</li>

<li><a href="profile.php">Profile</a></li>
<li><a href="log-out.php">Logout</a></li>

</ul>

</div>



<div class="main">


<h1>Register New Complaint</h1>


<div class="form-container">



<form method="POST">



<div class="form-group">

<label>Student Name</label>

<div class="input-box">

<input 
type="text"
id="name"
name="name"
placeholder="Enter your name"
required>


<button class="voice-btn" type="button" onclick="voiceInput('name')">
<i class="fa-solid fa-microphone"></i>
</button>

</div>

</div>



<div class="form-group">


<label>Email</label>


<div class="input-box">

<input
type="email"
id="email"
name="email"
placeholder="Enter your email"
required>

<button class="voice-btn" type="button" onclick="voiceEmail()">
<i class="fa-solid fa-microphone"></i>
</button>

</div>

</div>



<div class="form-group">

<label>Complaint Category</label>

<div class="input-box">

<select id="category" name="category" required>

<option value="">Select Category</option>

<option>Teacher Issue</option>

<option>Fee Issue</option>

<option>Transport Issue</option>

<option>Hostel Issue</option>

</select>


<button class="voice-btn" type="button" onclick="voiceCategory()">
<i class="fa-solid fa-microphone"></i>
</button>

</div>

</div>




<div class="form-group">

<label>Complaint Details</label>

<div class="input-box">


<textarea
id="details"
name="details"
placeholder="Write your complaint here"
required></textarea>


<button class="voice-btn" type="button" onclick="voiceInput('details')">
<i class="fa-solid fa-microphone"></i>
</button>


</div>

</div>



<button type="submit" name="submit">
Submit Complaint
</button>


</form>


<p style="color:green">

<?php echo $message; ?>

</p>


</div>

</div>





<script>


// Voice Input

function voiceInput(id){


let recognition = new webkitSpeechRecognition();

recognition.lang="en-US";

recognition.start();



recognition.onresult=function(event){


let text = event.results[0][0].transcript;


document.getElementById(id).value=text;



// Auto Category

if(id=="details"){


detectCategory(text);


}


}


}





// Email Voice

function voiceEmail(){


let recognition = new webkitSpeechRecognition();


recognition.lang="en-US";


recognition.start();



recognition.onresult=function(event){


let text =
event.results[0][0].transcript.toLowerCase();



text=text.replaceAll(" at ","@");

text=text.replaceAll(" dot ",".");

text=text.replaceAll(" ","");



document.getElementById("email").value=text;


}


}





// Voice Category

function voiceCategory(){


let recognition=new webkitSpeechRecognition();


recognition.lang="en-US";


recognition.start();



recognition.onresult=function(event){


detectCategory(
event.results[0][0].transcript
);


}


}





// Auto Category Function

function detectCategory(text){


text=text.toLowerCase();



if(
text.includes("teacher") ||
text.includes("sir") ||
text.includes("class") ||
text.includes("marks") ||
text.includes("attendance")
)

{

category.value="Teacher Issue";

}



else if(
text.includes("fee") ||
text.includes("challan") ||
text.includes("payment")
)

{

category.value="Fee Issue";

}



else if(
text.includes("bus") ||
text.includes("driver") ||
text.includes("transport") ||
text.includes("route")
)

{

category.value="Transport Issue";

}



else if(
text.includes("hostel") ||
text.includes("room") ||
text.includes("water") ||
text.includes("mess")
)

{

category.value="Hostel Issue";

}


}





// Typing Complaint Auto Detect

document.getElementById("details")
.addEventListener("keyup",function(){


detectCategory(this.value);


});



</script>



</body>

</html>