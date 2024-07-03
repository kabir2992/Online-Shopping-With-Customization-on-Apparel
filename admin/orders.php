<?php
session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Total Orders</title>
        <style>
/* Style the select dropdown with a light background */
select {
  background-color: aquamarine; /* Light background color */
  color: #333; /* Text color */
  padding: 10px;
  border: none;
  border-radius: 5px;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
}

/* Style the dropdown arrow icon */
select::after {
  content: '\25BC';
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  color: #333;
}

/* Style the options within the dropdown */
option {
  background-color: #f2f2f2; /* Light gray background color for each option */
  color: #333;
  padding: 5px 10px;
}

/* Style the hover state of options */
option:hover {
  background-color: #ddd; /* Light gray background color on hover */
}

        </style>
    </head>
    <body>
        
      <!-- End Navbar -->
      
      <?php
      if (isset($_SESSION['status_message'])) {
          //$status_message = $_SESSION['status_message'];
          echo '<center><div class="alert alert-success">' . $_SESSION['status_message'] . '</div></center>';
          unset($_SESSION['status_message']); // Remove the session variable after displaying
      }
      ?>
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Orders Page</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                    <tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select order_id, user_id, f_name, email, O_Date, prod_count, total_amt, order_status from orders_info")or die ("query 1 incorrect.....");
                        ?>
                        <tr>
                            <th>Order id</th>
                            <th>User id</th>
                            <th>First Name</th>
                            <th>Email Address</th>
                            <th>Order Date</th>
                            <th>Product Count</th>
                            <th>Total Bill</th>
                            <th>Order Status</th>
                        </tr>
                        <?php 
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>". $row['order_id'] ."</td>";
                            echo "<td>". $row['user_id'] ."</td>";
                            echo "<td>". $row['f_name'] ."</td>";
                            echo "<td>". $row['email'] ."</td>";
                            echo "<td>". $row['O_Date'] ."</td>";
                            echo "<td>". $row['prod_count'] ."</td>";
                            echo "<td>". $row['total_amt'] ."</td>";
                            echo "<td>";
                            echo "<form method='POST' action='update_status.php'>";
                            echo "<input type='hidden' name='order_id' value='".$row['order_id']."' />";
                            echo "<select name='order_status'>";
                            echo "<option value='Paid' ".($row['order_status'] == 'Paid' ? 'selected' : '').">Paid</option>";
                            echo "<option value='Order Accepted' ".($row['order_status'] == 'Order Accepted' ? 'selected' : '').">Order Accepted</option>";
                            echo "<option value='Order Shipped' ".($row['order_status'] == 'Order Shipped' ? 'selected' : '').">Order Shipped</option>";
                            echo "<option value='Delivered' ".($row['order_status'] == 'Delivered' ? 'selected' : '').">Delivered</option>";
                            echo "</select>";
                            echo "<input type='submit' name='update_status' class='btn btn-fill btn-primary' value='Update' />";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                  </table>    
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>
    </body>
</html>