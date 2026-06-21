<?php
include "db.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "UPDATE complaints SET status='Resolved' WHERE id=$id";

    mysqli_query($conn, $query);

    header("Location: my-complaint.php");
    exit();
}
?>