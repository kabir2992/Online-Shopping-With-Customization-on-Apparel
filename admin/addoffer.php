<?php
session_start();
include("../db.php");



if (isset($_POST['btn_save'])) {
    $offer_name = $_POST['offer_name'];
    $discount_percentage = $_POST['discount_percentage'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    mysqli_query($con, "INSERT INTO offers (offer_name, discount_percentage, start_date, end_date, status) VALUES ('$offer_name', '$discount_percentage', '$start_date', '$end_date', 'active')") or die("Query incorrect");

    $_SESSION['success_message'] = "Offer Added";
    header("location: index.php");
}

include "sidenav.php";
include "topheader.php";
?>
<html>
    <head>
        <title>Add Offer</title>
    </head>
    <body>
<center>
<div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Offer</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Offer Name</label>
                        <input type="text" id="offer_name" required name="offer_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Discount Percentage</label>
                        <input type="number" name="discount_percentage" required class="form-control" id="dicount_percentage" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" required class="form-control" id="start_date" >
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>End Date</label>
                        <input type="date" id="end_date" name="end_date" required class="form-control" >
                      </div>
                    </div>
                  </div>
              </div>
            </div>
             <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Add Offer</button>
              </div>
    </div>
          </div>
          </form>
        </div>
</div>
</center>
    
    
</body>
</html> 
        <?php 
        include 'footer.php';
        ?>