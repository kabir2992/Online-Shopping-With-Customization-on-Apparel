<?php
include 'sidenav.php';
include 'topheader.php';
include '../db.php';
error_reporting(0);
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Reports</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body style="background-color: white;">
    <center>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">MIS Report </h4>
                </div>

                <!-- <div class="col-sm-9 col-md-10 mt-5 text-center"> -->
                <form action="" method="POST" class="d-print-none">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="startdate" name="startdate" placeholder="Month Number" required>
                        </div> <span> To </span>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Year" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
                        </div>
                    </div>
                </form>
                <h5> Enter Month number and Year to get how many Products have been ordered by each City</h5>

                <?php
                if (isset($_POST['searchsubmit'])) {
                    $startdate = $_POST['startdate'];
                    $year = $_POST['year'];
                    $sql = "SELECT city, COUNT(*) AS order_count FROM orders_info WHERE YEAR(O_Date) = $year AND MONTH(O_Date) = $startdate GROUP BY city  DESC LIMIT 1";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        /* echo '
                          <p class=" bg-dark text-white p-2 mt-4">Details</p>
                          <table class="table">
                          <thead>
                          <tr><th scope="col">Sr No.</th>
                          <th scope="col">City Name</th>
                          <th scope="col">Count</th>
                          </tr>
                          </thead>
                          <tbody>'; */
                        $data = array();
                        while ($row = $result->fetch_assoc()) {
                            $data[$row["city"]] = $row["order_count"];

                        }
                        echo '<table><tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
                    } else {
                        echo "<center><div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div></center>";
                    }
                }


                $json_data = json_encode($data);

                echo $json_data;
                ?>
                <canvas id="chart"></canvas>
                <script>
                    var json_data = <?php echo $json_data; ?>;
                    var ctx = document.getElementById('chart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(json_data),
                            datasets: [{
                                    label: 'MIS Report',
                                    data: Object.values(json_data),
                                    backgroundColor: 'red',
                                    borderColor: 'white',
                                    borderWidth: 1
                                }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

            </div>
        </div>
    </div>       
</div>


</center>
</body>
</html>