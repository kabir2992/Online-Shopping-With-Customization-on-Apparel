<?php
session_start();
include("../db.php");

if (isset($_POST['toggle_status']) && isset($_POST['offer_id'])) {
   
    $offer_id = $_POST['offer_id'];

   
    $result = mysqli_query($con, "SELECT status FROM offers WHERE offer_id = $offer_id");
    $row = mysqli_fetch_array($result);
    $currentStatus = $row['status'];

   
    $newStatus = ($currentStatus === 'Active') ? 'Deactivated' : 'Active';

   
    $updateQuery = "UPDATE offers SET status = '$newStatus' WHERE offer_id = $offer_id";
    mysqli_query($con, $updateQuery); 
    
    header("Location: offerlist.php");
    exit();
}
?>