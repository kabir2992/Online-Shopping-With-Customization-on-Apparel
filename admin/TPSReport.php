<?php 
include 'sidenav.php';
include 'topheader.php';
include '../db.php';
error_reporting(0);
?>


<!DOCTYPE HTML>
<html>
    <title>Reports</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <body>
    <center>
        <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">TPS Report </h4>
              </div>
        
  <div class="col-sm-9 col-md-10 mt-5 text-center">
      <form action="" method="POST" class="d-print-none">
      <div class="form-row">
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="startdate" name="startdate">
      </div> <span> To </span>
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="enddate" name="enddate">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
      </div>
    </div>
  </form>
        <h5>Enter dates to get the total orders per city.</h5>
  <?php
 if(isset($_POST['searchsubmit'])){
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $sql = "SELECT city, COUNT(*) AS order_count FROM orders_info WHERE O_Date >= '$startdate' AND O_Date <= '$enddate' GROUP BY city";
    $result = $con->query($sql);
    if($result->num_rows > 0){
     echo '
  <p class=" bg-light text-dark p-2 mt-4">Details</p>
   <table class="table table-hover tablesorter">
    <thead>
        
      </tr>
    </thead>
    <tbody>';
     
      
      $data = array();
    while($row = $result->fetch_assoc()){
        $data [$row["city"]] = $row["order_count"];
    
        
       
      /*echo '<tr>
        <td scope="row">'.$data [$row["city"]].'</td>
        <td>'.$data [$row["order_count"]].'</td>
      </tr>';
      '<tr>
       <td scope="row">'.$data [$row["city"]].'</td>
        <td>'.$data [$row["order_count"]].'</td>
      </tr>';
      '<tr>
           <td scope="row">'.$data [$row["city"]].'</td>
        <td>'.$data [$row["order_count"]].'</td>
      </tr>';
    }
    echo '<tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
  }
 }
  ?>    */  
       
                        }
                        echo '<table><tr>
    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
  </tr></tbody>
  </table>';
                    } else {
                        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
                    }
                }


                $json_data = json_encode($data);

                //  echo $json_data;
                ?>

        <canvas id="chart" style=""></canvas>
            <style>
    .chartjs-x-axis, .chartjs-y-axis {
        color: white;
        font-weight: bold;
    }
</style>
                <script>
                    var json_data = <?php echo $json_data; ?>;
                    var ctx = document.getElementById('chart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(json_data),
                            datasets: [{
                                    label: 'TPS Report',
                                    data: Object.values(json_data),
                                    backgroundColor: 'black',
                                    borderColor: 'red',
                                    borderWidth: 3
                                }]
                        },
                        options: {
            scales: {
                x: [{
                    ticks: {
                        color: 'white',
                        beginAtZero: true,
                        labelString: "Months"
                    }
                }],
                y: [{
                    ticks: {
                        color: 'white',
                        beignAtzero: true
                    }
                }]
            }
        }
                    });
                </script>
</div>
</div>
</div>
    </thead>
    </body>
</html>