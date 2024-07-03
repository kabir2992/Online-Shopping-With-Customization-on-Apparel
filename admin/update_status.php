<?php 
session_start();
include '../db.php';

if(isset($_POST['update_status']))
{
    $order_id = $_POST['order_id'];
    $new_status = $_POST['order_status'];
    
    
    $update_query = "UPDATE orders_info SET order_status = '$new_status' WHERE order_id = '$order_id'";
    // Update the order status
    if (mysqli_query($con, $update_query)) {
        $_SESSION['status_message'] = "<h1 style='color:green;'>Order Status Updated</h1>";
        header("Location: orders.php");
        exit();
    }

    exit();
}
?>