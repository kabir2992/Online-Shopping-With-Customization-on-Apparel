<?php
include '../db.php';
include 'sidenav.php';
include 'topheader.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Total Products Report</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
    <center>
        <div class="col-md-6">
            <div class="card" style="background-color: white">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Total Products Report </h4>
              </div>
                <?php 
                $sql_1 = "SELECT COUNT(*) AS girl FROM products WHERE product_cat = 2;";
                $sql_2 = "SELECT COUNT(*) AS boy FROM products WHERE product_cat = 3;";
                $sql_3 = "SELECT COUNT(*) AS navratri FROM products WHERE offer_id = 1";
                $sql_4 = "SELECT COUNT(*) AS diwali FROM products WHERE offer_id = 2";
                
                $result1 = $con->query($sql_1);
                $result2 = $con->query($sql_2);
                $result3 = $con->query($sql_3);
                $result4 = $con->query($sql_4);
                
                $girl_array = $result1->fetch_assoc();
                $boy_array = $result2->fetch_assoc();
                $nav_array = $result3->fetch_assoc();
                $div_array = $result4->fetch_assoc();
                
                $girl_count = $girl_array["girl"];
                $boy_count = $boy_array["boy"];
                $nav_count = $nav_array["navratri"];
                $di_count = $div_array["diwali"];
                
                $data = array();
                $data[] = $girl_count;
                $data[] = $boy_count;
                $data[] = $nav_count;
                $data[] = $di_count;
                $data[] = ($girl_count + $boy_count + $nav_count + $di_count);
                
                $json_data = json_encode($data);
                
                $result1->free();
                $result2->free();
                
                echo $json_data;
                ?>
                <canvas id="user-count-chart"></canvas>
                <script>
    function createDoughnutChart() {
        //var json_data = ;
        
        var chrt = document.getElementById("user-count-chart").getContext("2d"); 

                var chart = new Chart(chrt, {
            type: 'doughnut',
            data: {
                labels: ["GIRLS", "BOYS", "NAVRATRI", "DIWALI", "TOTAL"],
                datasets: [{
                    label: "Products Count",
                    data: <?php echo $json_data; ?>,
                    backgroundColor: ['#FF6384', '#36A2EB', '#4169E1', '#9932CC', '#FFCE56'],
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });
    }
    createDoughnutChart();
                </script>
            </div>
        </div>
</center>
    </body>
</html>