<?php 
session_start();
include '../db.php';
include 'sidenav.php';
include 'topheader.php';


$page= null;

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
?>

<div class="content">
        <div class="container-fluid">
         <div class="panel-body">
            <div class="col-md-14">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Offers List</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Offer Name</th><th>Start Date</th><th>End Date</th><th>Status</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from offers")or die ("query 1 incorrect.....");

                        while ($row = mysqli_fetch_array($result)) {
                            $offer_id = $row['offer_id'];
                            $offer_name = $row['offer_name'];
                            $start_date = $row['start_date'];
                            $end_date = $row['end_date'];
                            $status = $row['status'];

                            echo "<tr>
                                <td>$offer_id</td>
                                <td>$offer_name</td>
                                <td>$start_date</td>
                                <td>$end_date</td>
                                <td>
                                 <form method='POST' action='update_offer_status.php'>
                                    <input type='hidden' name='offer_id' value='$offer_id'>
                                    <button class='btn btn-fill btn-primary' type='submit' name='toggle_status'>$status</button>
                                </form>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                  </table><br><br><br><br>
                    <div class="card-header card-header-primary">
                        <h5 class="title">All Offers List</h5>
                    </div>
                            <div class="card-body">
                                <div class="table-responsive ps">
                                    <table class="table tablesorter " id="page1">
                                        <thead class=" text-primary">
                                            <tr><th>Image</th><th>Name</th><th>Discounted Price</th><th>Offer Name<th>Status</th><th><a class="btn btn-primary" href="addproductoffer.php">Add New</a></th>
                                            </tr></thead>
                                        <tbody>
                    <?php
                    //counting paging

                    $list = mysqli_query($con, "SELECT p.product_image, p.product_title, p.discounted_price, o.offer_name, o.status
                        FROM products p
                        INNER JOIN offers o ON p.offer_id = o.offer_id;
                        ");
                    while(list($image,$product_name,$discounted_price,$offer_name,$status)=mysqli_fetch_array($list))
                        {
                        echo "<tr><td><img src='../product_images/$image' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
                        <td>$discounted_price</td>
                        <td>$offer_name</td>
                        <td>$status</td>
                        <td>

                        
                        </td></tr>";
                        }?>
                                        </tbody>
                                    </table>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                            </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                <?php
                $paging = mysqli_query($con, "SELECT p.product_image, p.product_title, p.discounted_price, o.offer_name
                        FROM products p
                        INNER JOIN offers o ON p.offer_id = o.offer_id;
                        ");
                    $count = mysqli_num_rows($paging);

                    $a = $count / 10;
                    $a = ceil($a);

                    for ($b = 1; $b <= $a; $b++) {
                        ?>
                        <li class="page-item"><a class="page-link" href="offerlist.php?page=<?php echo $b; ?>"><?php echo $b . " "; ?></a></li>
                        <?php
                    }
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        </ul>
                    </nav>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
         </div>
        </div>
</div>

<?php 
include 'footer.php';

?>